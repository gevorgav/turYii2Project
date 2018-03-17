<?php
use common\models\EventCategory;
use yii\web\View;
use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model common\models\Event */
/* @var $nextModel common\models\Event */
/* @var $item common\models\Event */
/* @var $upcoming []  */
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

$this->registerJsFile(
    '/gallery-js/ug-common-libraries.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);
$this->registerJsFile(
    '/gallery-js/ug-functions.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);
$this->registerJsFile(
    '/gallery-js/ug-thumbsgeneral.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);
$this->registerJsFile(
    '/gallery-js/ug-thumbsstrip.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);
$this->registerJsFile(
    '/gallery-js/ug-touchthumbs.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);
$this->registerJsFile(
    '/gallery-js/ug-panelsbase.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);
$this->registerJsFile(
    '/gallery-js/ug-strippanel.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);
$this->registerJsFile(
    '/gallery-js/ug-gridpanel.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);
$this->registerJsFile(
    '/gallery-js/ug-thumbsgrid.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);
$this->registerJsFile(
    '/gallery-js/ug-tiles.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);
$this->registerJsFile(
    '/gallery-js/ug-tiledesign.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);
$this->registerJsFile(
    '/gallery-js/ug-avia.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);
$this->registerJsFile(
    '/gallery-js/ug-slider.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);
$this->registerJsFile(
    '/gallery-js/ug-sliderassets.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);
$this->registerJsFile(
    '/gallery-js/ug-touchslider.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);
$this->registerJsFile(
    '/gallery-js/ug-zoomslider.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);
$this->registerJsFile(
    '/gallery-js/ug-video.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);
$this->registerJsFile(
    '/gallery-js/ug-gallery.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);




$this->registerJsFile(
    '/gallery-js/ug-lightbox.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);
$this->registerJsFile(
    '/gallery-js/ug-carousel.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);
$this->registerJsFile(
    '/gallery-js/ug-api.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);
$this->registerJsFile(
    '/gallery-themes/default/ug-theme-default.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);

$this->registerCssFile("/gallery-css/unite-gallery.css");
$this->registerCssFile("/gallery-themes/default/ug-theme-default.css");

$this->registerJs(
    "
        jQuery(document).ready(function(){

                    jQuery(\"#gallery\").unitegallery();

                });
    ");
//$this->params['breadcrumbs'][] = ['label' => Yii::t('frontend', 'Events'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<?php
$this->registerJs(
"
$( document ).ready(function() {
        $('.template').css( 'background-image', 'url(".$model->thumbnail_base_url.'/' . $model->thumbnail_path.")' );
    });",
View::POS_READY
);

?>


<section class="template page-head section-img">
    <div class="gradient gradient-vr-56">
        <div class="container" style="height: 100%;">
            <div class="flex-space-between flex-align-end">
                <div class="text-block">
                    <h1><?= $model->getMultilingual('title', YII::$app->language)?></h1>
                    <p><?= Html::a( $model->category->getMultilingual('title', YII::$app->language), ['events/'])?></p>
                </div>
                <?php if ($nextModel != null): ?>
                    <div class="next-event">
                        <div class="next-text">
    <!--                        --><?//= Html::a( $nextModel->getMultilingual('title', YII::$app->language), [])?>
                                <a href="/events/<?=$nextModel->slug?>">
                                    <h3><?= $nextModel->getMultilingual('title', YII::$app->language)?></h3>
                                    <p><?= Yii::t('frontend', 'Next event')?></p>
                                </a>
                        </div>
                        <div class="next-arr">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<section class="template-text template-1 event-details">
    <div class="container">
        <div class="event-info-block">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="event-info-item">
                        <div class="event-info-item-container">
                            <div class="pull-left event-info-item-icon map-icon"></div>
                            <div class="pull-left">
                                <p class="dark-text"><?= Yii::t('frontend', 'Location')?></p>
                                <p class="light-text"><?= $model->getMultilingual('location_name', YII::$app->language)?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="event-info-item">
                        <div class="event-info-item-container">
                            <div class="pull-left event-info-item-icon date-icon"></div>
                            <div class="pull-left">
                                <p class="dark-text"><?= Yii::t('frontend', 'Date')?></p>
                                <p class="light-text"><?php echo Yii::$app->formatter->asDate($model->event_date_time, "d MMM, Y ") ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" id="latitudeId" value="<?= $model->latitude ?>">
                <input type="hidden" id="longitudeId" value="<?= $model->longitude ?>">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="event-info-item">
                        <div class="event-info-item-container">
                            <div class="pull-left event-info-item-icon time-icon"></div>
                            <div class="pull-left">
                                <p class="dark-text"><?= Yii::t('frontend', 'Time')?></p>
                                <?php
//                                Yii::$app->formatter->locale = Yii::$app->language.'-'.strtoupper(Yii::$app->language);
//                                echo Yii::$app->formatter->asDatetime($model->event_date_time);
                                ?>
                                <p class="light-text"><?php echo Yii::$app->formatter->asTime($model->event_date_time, "HH:mm") ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="event-info-item">
                        <div class="event-info-item-container">
                            <div class="pull-left event-info-item-icon ticket-icon"></div>
                            <div class="pull-left">
                                <p class="dark-text"><?= Yii::t('frontend', 'Tickets')?></p>
                                <p class="light-text"><?php echo ($model->ticket_price)?number_format($model->ticket_price, 2, ',', ' ').' '.Yii::t('frontend','AMD'):Yii::t('frontend','FREE')  ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="row">
                <div class="col-md-7 col-sm-6 com-xs-12">
<!--                    <h2>--><?//= $model->getMultilingual('short_description', Yii::$app->language)?><!--</h2>-->
                    <?= $model->getMultilingual('body', Yii::$app->language)?>
                </div>
                <div class="col-md-5 col-sm-6 com-xs-12">
                    <div id="map">
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <div id="gallery" style="display:none;">

                <img alt="Preview Image 1"
                     src="images/thumbs/thumb1.jpg"
                     data-image="images/big/image1.jpg"
                     data-description="Preview Image 1 Description">

                <img alt="Preview Image 2"
                     src="images/thumbs/thumb2.jpg"
                     data-image="images/big/image2.jpg"
                     data-description="Preview Image 2 Description">

                <img alt="Youtube Video"
                     data-type="youtube"
                     data-videoid="A3PDXmYoF5U"
                     data-description="You can include youtube videos easily!">

                <img alt="Preview Image 3"
                     src="images/thumbs/thumb3.jpg"
                     data-image="images/big/image3.jpg"
                     data-description="Preview Image 3 Description">

                <img alt="Vimeo Video"
                     data-type="vimeo"
                     src="http://i.vimeocdn.com/video/447294219_200x150.jpg"
                     data-image="http://i.vimeocdn.com/video/447294219_640.jpg"
                     data-videoid="73234449"
                     data-description="This gallery can also play vimeo videos!">

                <img alt="Preview Image 4"
                     src="images/thumbs/thumb4.jpg"
                     data-image="images/big/image4.jpg"
                     data-description="Preview Image 4 Description">

                <img alt="Html5 Video"
                     src="images/thumbs/html5_video.png"
                     data-type="html5video"
                     data-image="http://video-js.zencoder.com/oceans-clip.png"
                     data-videoogv="http://video-js.zencoder.com/oceans-clip.ogv"
                     data-videowebm="http://video-js.zencoder.com/oceans-clip.webm"
                     data-videomp4="http://video-js.zencoder.com/oceans-clip.mp4"
                     data-description="This is html5 video demo played by mediaelement2 player">

                <img alt="Preview Image 5"
                     src="images/thumbs/thumb1.jpg"
                     data-image="images/big/image1.jpg"
                     data-description="Preview Image 5 Description">

                <img alt="Wistia Video"
                     src="images/thumbs/wistia_video.jpg"
                     data-type="wistia"
                     data-image="images/big/wistia_video.jpg"
                     data-videoid="9oedgxuciv"
                     data-description="Hey, the gallery plays Wistia videos too!">

                <img alt="Preview Image 6"
                     src="images/thumbs/thumb2.jpg"
                     data-image="images/big/image2.jpg"
                     data-description="Preview Image 6 Description">


                <img alt="Sound Cloud Track"
                     src="images/thumbs/sound_cloud.jpg"
                     data-type="soundcloud"
                     data-image="images/thumbs/sound_cloud.jpg"
                     data-trackid="8390970"
                     data-description="This gallery can play a soundcloud track">


                <img alt="Preview Image 7"
                     src="images/thumbs/thumb3.jpg"
                     data-image="images/big/image3.jpg"
                     data-description="Preview Image 7 Description">


                <img alt="Preview Image 8"
                     src="images/thumbs/thumb4.jpg"
                     data-image="images/big/image4.jpg"
                     data-description="Preview Image 8 Description">

                <img alt="Preview Image 9"
                     src="images/thumbs/thumb1.jpg"
                     data-image="images/big/image1.jpg"
                     data-description="Preview Image 9 Description">

                <img alt="Preview Image 10"
                     src="images/thumbs/thumb2.jpg"
                     data-image="images/big/image2.jpg"
                     data-description="Preview Image 10 Description">

                <img alt="Preview Image 11"
                     src="images/thumbs/thumb3.jpg"
                     data-image="images/big/image3.jpg"
                     data-description="Preview Image 11 Description">

            </div>

        </div>
    </div>
</section>
<section class="events grey-bg">
    <div class="container">
        <h2><?= Yii::t('frontend', 'Upcoming Events')?></h2>
        <div class="line"></div>
        <div class="row">
            <?php foreach ($upcoming as $key => $item): ?>
                <div class="col-md-4 col-xs-12">
                    <div class="event-item" style="background: url(<?=$item->thumbnail_base_url.'/' . $item->thumbnail_path?>) no-repeat center;">
                        <div class="black-57">
                            <h3 class="pull-left">
                                <div class="ellipsis"><?= $item->getMultilingual('title', YII::$app->language)?></div>
                            </h3>
                            <h3 class="pull-right date"><?php echo Yii::$app->formatter->asDate($item->event_date_time, "d MMM") ?></h3>
                            <div class="clear"></div>
                            <p class="event-location"><?= Yii::t('frontend', 'Location').': '.$item->getMultilingual('location_name', YII::$app->language)?></p>
                            <p><?=$item->getMultilingual('short_description', YII::$app->language)?></p>
                            <div class="flex-center">
                                <?php echo Html::a( Yii::t('frontend', 'VISIT EVENT'), ['view', 'slug'=>$item->slug],['class'=>'calendar-visit-event']) ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
        <div class="flex-center">
            <?= Html::a(Yii::t('frontend','all events'), ['/events'], ['class'=>'button-liner blue']) ?>
        </div>
    </div>
</section>
