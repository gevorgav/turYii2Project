<?php
use common\models\EventCategory;
use yii\web\View;
use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model common\models\Event */
/* @var $nextModel common\models\Event */

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
                                <p class="dark-text">Location</p>
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
                                <p class="dark-text">Date</p>
                                <p class="light-text"><?= date("M d, Y", ($model->event_date_time))?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="event-info-item">
                        <div class="event-info-item-container">
                            <div class="pull-left event-info-item-icon time-icon"></div>
                            <div class="pull-left">
                                <p class="dark-text">Time</p>
                                <?php
//                                Yii::$app->formatter->locale = Yii::$app->language.'-'.strtoupper(Yii::$app->language);
//                                echo Yii::$app->formatter->asDatetime($model->event_date_time);
                                ?>
                                <p class="light-text"><?= date("G:i", ($model->event_date_time))?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="event-info-item">
                        <div class="event-info-item-container">
                            <div class="pull-left event-info-item-icon ticket-icon"></div>
                            <div class="pull-left">
                                <p class="dark-text">Tickets</p>
                                <p class="light-text"><?php echo ($model->ticket_price)?number_format($model->ticket_price, 2, ',', ' ').' AMD':'FREE'  ?></p>
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
    </div>
</section>
<section class="events grey-bg">
    <div class="container">
        <h2>Upcoming Events</h2>
        <div class="line"></div>
        <div class="row">
            <div class="col-md-4 col-xs-12">
                <div class="event-item item-1">
                    <div class="black-57">
                        <h3 class="pull-left">
                            <div class="ellipsis">Wine Festival</div>
                        </h3>
                        <h3 class="pull-right date">16 sep</h3>
                        <div class="clear"></div>
                        <p class="event-location">Location: Togh</p>
                        <p>The 4th Artsakh Wine Festival will be held in Togh village, in the territory of Melik's Palace on September 16, 2017 which will host dozens of winemakers Artsakh and Armenia.Within the frames of the festival, exhibition fair of wine, agricultural products, art works, as well as ‘The treasuries of Togh's Melik Palace’ exhibition, concert, group excursions and other activities...</p>
                        <div class="flex-center">
                            <a href="#">visit event</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xs-12">
                <div class="event-item item-2">
                    <div class="black-57">
                        <h3 class="pull-left">
                            <div class="ellipsis">Air Fest</div>
                        </h3>
                        <h3 class="pull-right date">17 jun</h3>
                        <div class="clear"></div>
                        <p class="event-location">Location: Stepanakert</p>
                        <p>The 4th Artsakh Wine Festival will be held in Togh village, in the territory of Melik's Palace on September 16, 2017 which will host dozens of winemakers Artsakh and Armenia.Within the frames of the festival, exhibition fair of wine, agricultural products, art works, as well as ‘The treasuries of Togh's Melik Palace’ exhibition, concert, group excursions and other activities...</p>
                        <div class="flex-center">
                            <a href="#">visit event</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xs-12">
                <div class="event-item item-3">
                    <div class="black-57">
                        <h3 class="pull-left">
                            <div class="ellipsis">Sculpturers Sympozium</div>
                        </h3>
                        <h3 class="pull-right date">8 may</h3>
                        <div class="clear"></div>
                        <p class="event-location">Location: Shoushi</p>
                        <p>The 4th Artsakh Wine Festival will be held in Togh village, in the territory of Melik's Palace on September 16, 2017 which will host dozens of winemakers Artsakh and Armenia.Within the frames of the festival, exhibition fair of wine, agricultural products, art works, as well as ‘The treasuries of Togh's Melik Palace’ exhibition, concert, group excursions and other activities...</p>
                        <div class="flex-center">
                            <a href="#">visit event</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex-center">
            <?= Html::a(Yii::t('frontend','all events'), ['/events'], ['class'=>'button-liner blue']) ?>
        </div>
    </div>
</section>
