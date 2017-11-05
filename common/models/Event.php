<?php

namespace common\models;

use common\models\query\EventQuery;
use common\models\EventCategory;
use trntv\filekit\behaviors\UploadBehavior;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "event".
 *
 * @property integer $id
 * @property string $slug
 * @property string $title_hy
 * @property string $title_en
 * @property string $title_ru
 * @property string $title_de
 * @property string $title_fr
 * @property string $title_es
 * @property string $title_ar
 * @property string $title_ir
 * @property string $body_hy
 * @property string $body_en
 * @property string $body_ru
 * @property string $body_de
 * @property string $body_fr
 * @property string $body_es
 * @property string $body_ar
 * @property string $body_ir
 * @property string $view
 * @property string $short_description_hy
 * @property string $short_description_en
 * @property string $short_description_ru
 * @property string $short_description_de
 * @property string $short_description_fr
 * @property string $short_description_es
 * @property string $short_description_ar
 * @property string $short_description_ir
 * @property integer $event_date_time
 * @property string $ticket_price
 * @property string $location_name_hy
 * @property string $location_name_en
 * @property string $location_name_ru
 * @property string $location_name_de
 * @property string $location_name_fr
 * @property string $location_name_es
 * @property string $location_name_ar
 * @property string $location_name_ir
 * @property string $address_hy
 * @property string $address_en
 * @property string $address_ru
 * @property string $address_de
 * @property string $address_fr
 * @property string $address_es
 * @property string $address_ar
 * @property string $address_ir
 * @property string $latitude
 * @property string $longitude
 * @property boolean $isGallery
 * @property string $video_link
 * @property string $agenda_hy
 * @property string $agenda_en
 * @property string $agenda_ru
 * @property string $agenda_de
 * @property string $agenda_fr
 * @property string $agenda_es
 * @property string $agenda_ar
 * @property string $agenda_ir
 * @property string $tags
 * @property integer $category_id
 * @property string $thumbnail_base_url
 * @property string $thumbnail_path
 * @property integer $status
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $published_at
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property User $author
 * @property User $updater
 * @property EventCategory $category
 * @property EventAttachment[] $eventAttachments
 */
class Event extends \yii\db\ActiveRecord
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
        return '{{%event}}';
    }

    public static function find()
    {
        return new EventQuery(get_called_class());
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
//        return [
//            [['slug', 'title_en', 'body_en', 'short_description_en', 'event_date_time','category_id'], 'required'],
//            [['body_hy', 'body_en', 'body_ru', 'body_de', 'body_fr', 'body_es', 'body_ar', 'body_ir', 'agenda_hy', 'agenda_en', 'agenda_ru', 'agenda_de', 'agenda_fr', 'agenda_es', 'agenda_ar', 'agenda_ir'], 'string'],
//            [['event_date_time', 'category_id', 'status', 'created_by', 'updated_by', 'published_at', 'created_at', 'updated_at'], 'integer'],
//            [['ticket_price'], 'number'],
//            [['isGallery'], 'boolean'],
//            [['slug', 'video_link', 'thumbnail_base_url', 'thumbnail_path'], 'string', 'max' => 1024],
//            [['title_hy', 'title_en', 'title_ru', 'title_de', 'title_fr', 'title_es', 'title_ar', 'title_ir'], 'string', 'max' => 512],
//            [['view'], 'string', 'max' => 255],
//            [['short_description_hy', 'short_description_en', 'short_description_ru', 'short_description_de', 'short_description_fr', 'short_description_es', 'short_description_ar', 'short_description_ir'], 'string', 'max' => 250],
//            [['location_name_hy', 'location_name_en', 'location_name_ru', 'location_name_de', 'location_name_fr', 'location_name_es', 'location_name_ar', 'location_name_ir', 'address_hy', 'address_en', 'address_ru', 'address_de', 'address_fr', 'address_es', 'address_ar', 'address_ir', 'type'], 'string', 'max' => 150],
//            [['latitude', 'longitude'], 'string', 'max' => 20],
//        ];

        return [
            [['title_en','body_en', 'short_description_en', 'event_date_time','category_id'], 'required'],
            [['slug'], 'unique'],
            [['body_hy', 'body_en', 'body_ru', 'body_de', 'body_fr', 'body_es', 'body_ar', 'body_ir', 'agenda_hy', 'agenda_en', 'agenda_ru', 'agenda_de', 'agenda_fr', 'agenda_es', 'agenda_ar', 'agenda_ir', 'tags'], 'string'],
            [['title_hy', 'title_en', 'title_ru', 'title_de', 'title_fr', 'title_es', 'title_ar', 'title_ir'], 'string', 'max' => 512],
            [['short_description_hy', 'short_description_en', 'short_description_ru', 'short_description_de', 'short_description_fr', 'short_description_es', 'short_description_ar', 'short_description_ir'], 'string', 'max' => 250],
            [['location_name_hy', 'location_name_en', 'location_name_ru', 'location_name_de', 'location_name_fr', 'location_name_es', 'location_name_ar', 'location_name_ir', 'address_hy', 'address_en', 'address_ru', 'address_de', 'address_fr', 'address_es', 'address_ar', 'address_ir'], 'string', 'max' => 150],
            [['latitude', 'longitude'], 'string', 'max' => 20],
            [['ticket_price'], 'number'],
            [['isGallery'], 'boolean'],
            [['published_at', 'event_date_time'], 'default', 'value' => function () {
                return date(DATE_ISO8601);
            }],
            [['published_at', 'event_date_time'], 'filter', 'filter' => 'strtotime', 'skipOnEmpty' => true],
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
            'location_name_hy' => $this->location_name_hy,
            'location_name_en' => $this->location_name_en,
            'location_name_ru' => $this->location_name_ru,
            'location_name_de' => $this->location_name_de,
            'location_name_fr' => $this->location_name_fr,
            'location_name_es' => $this->location_name_es,
            'location_name_ar' => $this->location_name_ar,
            'location_name_ir' => $this->location_name_ir,
            'address_hy' => $this->address_hy,
            'address_en' => $this->address_en,
            'address_ru' => $this->address_ru,
            'address_de' => $this->address_de,
            'address_fr' => $this->address_fr,
            'address_es' => $this->address_es,
            'address_ar' => $this->address_ar,
            'address_ir' => $this->address_ir,
            'agenda_hy' => $this->agenda_hy,
            'agenda_en' => $this->agenda_en,
            'agenda_ru' => $this->agenda_ru,
            'agenda_de' => $this->agenda_de,
            'agenda_fr' => $this->agenda_fr,
            'agenda_es' => $this->agenda_es,
            'agenda_ar' => $this->agenda_ar,
            'agenda_ir' => $this->agenda_ir,
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
            'title_hy' => 'Title',
            'title_en' => 'Title',
            'title_ru' => 'Title',
            'title_de' => 'Title',
            'title_fr' => 'Title',
            'title_es' => 'Title',
            'title_ar' => 'Title',
            'title_ir' => 'Title',
            'body_hy' => 'Body',
            'body_en' => 'Body',
            'body_ru' => 'Body',
            'body_de' => 'Body',
            'body_fr' => 'Body',
            'body_es' => 'Body',
            'body_ar' => 'Body',
            'body_ir' => 'Body',
            'short_description_hy' => 'Short Description',
            'short_description_en' => 'Short Description',
            'short_description_ru' => 'Short Description',
            'short_description_de' => 'Short Description',
            'short_description_fr' => 'Short Description',
            'short_description_es' => 'Short Description',
            'short_description_ar' => 'Short Description',
            'short_description_ir' => 'Short Description',
            'location_name_hy' => 'Location Name',
            'location_name_en' => 'Location Name',
            'location_name_ru' => 'Location Name',
            'location_name_de' => 'Location Name',
            'location_name_fr' => 'Location Name',
            'location_name_es' => 'Location Name',
            'location_name_ar' => 'Location Name',
            'location_name_ir' => 'Location Name',
            'address_hy' => 'Address',
            'address_en' => 'Address',
            'address_ru' => 'Address',
            'address_de' => 'Address',
            'address_fr' => 'Address',
            'address_es' => 'Address',
            'address_ar' => 'Address',
            'address_ir' => 'Address',
            'agenda_hy' => 'Agenda',
            'agenda_en' => 'Agenda',
            'agenda_ru' => 'Agenda',
            'agenda_de' => 'Agenda',
            'agenda_fr' => 'Agenda',
            'agenda_es' => 'Agenda',
            'agenda_ar' => 'Agenda',
            'agenda_ir' => 'Agenda',
            'view' => 'View',
            'event_date_time' => 'Event Date Time',
            'ticket_price' => 'Ticket Price',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'isGallery' => 'Is Gallery',
            'video_link' => 'Video Link',
            'tags' => 'Tags',
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
        return $this->hasOne(EventCategory::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventAttachments()
    {
        return $this->hasMany(EventAttachment::className(), ['event_id' => 'id']);
    }
}
