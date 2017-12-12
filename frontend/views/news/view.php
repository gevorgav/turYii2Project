<?php
use common\models\NewsCategory;
use yii\web\View;
use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model common\models\News */
/* @var $nextModel common\models\News */

//------ SEO ------------
$this->title = $model->getMultilingual('title', YII::$app->language);

$this->registerMetaTag([
    'name' => 'description',
    'content' => $model->getMultilingual('short_description', YII::$app->language),
]);
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => $model->getMultilingual('keywords', YII::$app->language),
]);

//$this->params['breadcrumbs'][] = ['label' => Yii::t('frontend', 'News'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>

<section class="news">
    <div class="container">
        <div class="row">
            <div class="col-md-8 news-content">
                <h2><?= $model->getMultilingual('title', YII::$app->language);?></h2>
                <div class="tag light-text">
                    <i class="fa fa-tag" aria-hidden="true"></i>
                    <span><?= $model->category->getMultilingual('title', YII::$app->language);?></span>
                </div>
                <div class="post-date light-text">
                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                    <span><?= date("M d, Y", ($model->published_at))?></span>
                </div>
                <div class="news-main-block">
<!--                --><?php //echo Html::img($model->thumbnail_base_url.'/' . $model->thumbnail_path,['width' => '100px', 'alt' => $model->getMultilingual('title', Yii::$app->language)]);?>
                <?= $model->getMultilingual('body', YII::$app->language);?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="hr-line"></div>
                <div class="news-sidebar">
                    <?php foreach ($latestNews as $key => $item){ ?>
                        <div class="item">
                            <a href="/news/<?= $item->slug?>">
                                <div class="img-container">
                                    <img src="<?=$item->thumbnail_base_url.'/' . $item->thumbnail_path?>" alt="">
                                </div>
                                <div class="text">
                                    <h4><?= $item->getMultilingual('title', YII::$app->language);?></h4>
                                    <div class="tag light-text">
                                        <i class="fa fa-tag" aria-hidden="true"></i>
                                        <span><?= $model->category->getMultilingual('title', YII::$app->language);?></span>
                                    </div>
                                    <div class="post-date light-text">
                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                        <span><?php echo Yii::$app->formatter->asDate($item->published_at, "d MMM, y") ?></span>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </a>
                        </div>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="home-activity white-txt-block grey-bg">
    <div class="container">
        <h2>Activity</h2>
        <div class="line"></div>
        <div class="row">
            <div class="col-sm-4 col-xs-12">
                <a href="#">
                    <div class="item item-1">
                        <div class="black-57">
                            <div class="activity-icon-1"></div>
                            <h4>Hiking</h4>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-4 col-xs-12">
                <a href="#">
                    <div class="item item-2">
                        <div class="black-57">
                            <div class="activity-icon-2"></div>
                            <h4>Flights above Artsakh</h4>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-4 col-xs-12">
                <a href="#">
                    <div class="item item-4">
                        <div class="black-57">
                            <div class="activity-icon-4"></div>
                            <h4>Mountain biking</h4>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
