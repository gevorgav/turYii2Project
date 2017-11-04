<?php
/**
 * @var $this yii\web\View
 * @var $model common\models\Event
 */
use yii\helpers\Html;
use common\models\EventCategory;

?>

<div class="item">
    <div class="col-md-3 col-sm-4 col-xs-12 item-img">
        <?php echo Html::img($model->thumbnail_base_url.'/' . $model->thumbnail_path,['width' => '100px', 'alt' => $model->getMultilingual('title', Yii::$app->language)]);?>
    </div>
    <div class="col-md-9 col-sm-8  col-xs-12 item-information">
        <h4><?= $model->getMultilingual('title', Yii::$app->language)?></h4>
<!--        --><?php //echo Html::a(
//            $model->category->title_en,
//            ['index', 'EventSearch[category_id]' => $model->category_id]
//        )?>
        <span class="item-type"><?= $model->category->getMultilingual("title", Yii::$app->language)?></span>
        <div class="date"><?= date("d M", ($model->published_at))?></div>
        <p class="calendar-mini-description"><?php echo \yii\helpers\StringHelper::truncate($model->getMultilingual('short_description', Yii::$app->language), 150, '...', null, true) ?></p>
        <ul>
            <li class="event-mini-indicator">
                <div class="pull-left">
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                </div>
                <div class="pull-left">
                    <p class="light-text">Place</p>
                    <p class="dark-text"><?php echo $model->getMultilingual('location_name', Yii::$app->language).' '.$model->getMultilingual('address', Yii::$app->language)?></p>
                </div>
            </li>
            <li class="event-mini-indicator">
                <div class="pull-left">
                    <i class="fa fa-calendar-o" aria-hidden="true"></i>
                </div>
                <div class="pull-left">
                    <p class="light-text">Date Time</p>
<!--                    --><?php //echo Yii::$app->formatter->asDatetime($model->created_at) ?>
                    <p class="dark-text"><?= date("d M G:i", ($model->event_date_time))?></p>
                </div>
            </li>
            <li class="event-mini-indicator">
                <div class="pull-left">
                    <i class="fa fa-ticket" aria-hidden="true"></i>
                </div>
                <div class="pull-left">
                    <p class="light-text">Tickets</p>
                    <p class="dark-text"><?php echo ($model->ticket_price)?number_format($model->ticket_price, 2, ',', ' ').' AMD':'FREE'  ?></p>
                </div>
            </li>
        </ul>
        <div class="clear"></div>
        <?php echo Html::a( Yii::t('frontend', 'VISIT EVENT').'<i class="fa fa-angle-right" aria-hidden="true"></i>', ['view', 'slug'=>$model->slug],['class'=>'calendar-visit-event']) ?>
    </div>
    <div class="clear"></div>
</div>

