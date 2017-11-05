<?php

namespace common\models;

use common\models\query\NewsQuery;
use common\models\NewsCategory;
use trntv\filekit\behaviors\UploadBehavior;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "news".
 *
 * @property integer $id
 * @property string $slug
 * @property string $title_en
 * @property string $title_hy
 * @property string $title_ru
 * @property string $title_de
 * @property string $title_fr
 * @property string $title_es
 * @property string $title_ar
 * @property string $title_ir
 * @property string $body_en
 * @property string $body_hy
 * @property string $body_ru
 * @property string $body_de
 * @property string $body_fr
 * @property string $body_es
 * @property string $body_ar
 * @property string $body_ir
 * @property string $short_description_en
 * @property string $short_description_hy
 * @property string $short_description_ru
 * @property string $short_description_de
 * @property string $short_description_fr
 * @property string $short_description_es
 * @property string $short_description_ar
 * @property string $short_description_ir
 * @property string $tags
 * @property string $view
 * @property integer $category_id
 * @property string $thumbnail_base_url
 * @property string $thumbnail_path
 * @property integer $status
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $published_at
 * @property integer $created_at
 * @property integer $updated_at
 */
class News extends \yii\db\ActiveRecord
{
    const STATUS_PUBLISHED = 1;
    const STATUS_DRAFT = 0;

    /**
     * @var array
     */
    public $attachments;

    /**
     * @var array
     */
    public $thumbnail;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%news}}';
    }

    public static function find()
    {
        return new NewsQuery(get_called_class());
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            BlameableBehavior::className(),
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'title_en',
                'immutable' => true
            ],
            [
                'class' => UploadBehavior::className(),
                'attribute' => 'attachments',
                'multiple' => true,
                'uploadRelation' => 'eventAttachments',
                'pathAttribute' => 'path',
                'baseUrlAttribute' => 'base_url',
                'orderAttribute' => 'order',
                'typeAttribute' => 'type',
                'sizeAttribute' => 'size',
                'nameAttribute' => 'name',
            ],
            [
                'class' => UploadBehavior::className(),
                'attribute' => 'thumbnail',
                'pathAttribute' => 'thumbnail_path',
                'baseUrlAttribute' => 'thumbnail_base_url'
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title_en','body_en', 'short_description_en','category_id'], 'required'],
            [['slug'], 'unique'],
            [['body_hy', 'body_en', 'body_ru', 'body_de', 'body_fr', 'body_es', 'body_ar', 'body_ir', 'tags'], 'string'],
            [['title_hy', 'title_en', 'title_ru', 'title_de', 'title_fr', 'title_es', 'title_ar', 'title_ir'], 'string', 'max' => 512],
            [['short_description_hy', 'short_description_en', 'short_description_ru', 'short_description_de', 'short_description_fr', 'short_description_es', 'short_description_ar', 'short_description_ir'], 'string', 'max' => 250],
            [['published_at'], 'default', 'value' => function () {
                return date(DATE_ISO8601);
            }],
            [['published_at'], 'filter', 'filter' => 'strtotime', 'skipOnEmpty' => true],
            [['category_id'], 'exist', 'targetClass' => EventCategory::className(), 'targetAttribute' => 'id'],
            [['status'], 'integer'],
            [['slug', 'video_link', 'thumbnail_base_url', 'thumbnail_path'], 'string', 'max' => 1024],
            [['view'], 'string', 'max' => 255],
            [['attachments', 'thumbnail'], 'safe']
        ];
    }

    public function getMultilingual($multilingualField, $lang){
        return $this->getMultilignualParams($multilingualField."_".$lang);
    }

    private function getMultilignualParams($fieldLang){
        $arr = [
            'title_hy' => $this->title_hy,
            'title_en' => $this->title_en,
            'title_ru' => $this->title_ru,
            'title_de' => $this->title_de,
            'title_fr' => $this->title_fr,
            'title_es' => $this->title_es,
            'title_ar' => $this->title_ar,
            'title_ir' => $this->title_ir,
            'body_hy' => $this->body_hy,
            'body_en' => $this->body_en,
            'body_ru' => $this->body_ru,
            'body_de' => $this->body_de,
            'body_fr' => $this->body_fr,
            'body_es' => $this->body_es,
            'body_ar' => $this->body_ar,
            'body_ir' => $this->body_ir,
            'short_description_hy' => $this->short_description_hy,
            'short_description_en' => $this->short_description_en,
            'short_description_ru' => $this->short_description_ru,
            'short_description_de' => $this->short_description_de,
            'short_description_fr' => $this->short_description_fr,
            'short_description_es' => $this->short_description_es,
            'short_description_ar' => $this->short_description_ar,
            'short_description_ir' => $this->short_description_ir,
        ];
        foreach ($arr as $i => $value) {
            if ($fieldLang == $i)
                return($arr[$i]);
        }
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'slug' => 'Slug',
            'title_en' => 'Title',
            'title_hy' => 'Title',
            'title_ru' => 'Title',
            'title_de' => 'Title',
            'title_fr' => 'Title',
            'title_es' => 'Title',
            'title_ar' => 'Title',
            'title_ir' => 'Title',
            'body_en' => 'Body',
            'body_hy' => 'Body',
            'body_ru' => 'Body',
            'body_de' => 'Body',
            'body_fr' => 'Body',
            'body_es' => 'Body',
            'body_ar' => 'Body',
            'body_ir' => 'Body',
            'short_description_en' => 'Short Description',
            'short_description_hy' => 'Short Description',
            'short_description_ru' => 'Short Description',
            'short_description_de' => 'Short Description',
            'short_description_fr' => 'Short Description',
            'short_description_es' => 'Short Description',
            'short_description_ar' => 'Short Description',
            'short_description_ir' => 'Short Description',
            'tags' => 'Tags',
            'view' => 'View',
            'category_id' => 'Category ID',
            'thumbnail_base_url' => 'Thumbnail Base Url',
            'thumbnail_path' => 'Thumbnail Path',
            'status' => 'Status',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'published_at' => 'Published At',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdater()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(NewsCategory::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventAttachments()
    {
        return $this->hasMany(EventAttachment::className(), ['news_id' => 'id']);
    }
}
