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
                <?php echo Html::img($model->thumbnail_base_url.'/' . $model->thumbnail_path,['width' => '100px', 'alt' => $model->getMultilingual('title', Yii::$app->language)]);?>
            </div>
            <div class="col-md-4">
                <div class="hr-line"></div>
                <div class="news-sidebar">
                    <div class="main-item">
                        <a href="#">
                            <div class="img-block-gradient-hr">
                                <img src="img/nikol-duman-tangaran.jpg" alt="">
                            </div>
                            <div class="text">
                                <h3>Lorem Ipsum dolor</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing </p>
                            </div>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <div class="img-container">
                                <img src="img/tatik-main.jpg" alt="">
                            </div>
                            <div class="text">
                                <h4>Lorem ipsum dolor siteb amet consectetur</h4>
                                <div class="tag light-text">
                                    <i class="fa fa-tag" aria-hidden="true"></i>
                                    <span>Festival</span>
                                </div>
                                <div class="post-date light-text">
                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    <span>September 26, 2017</span>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <div class="img-container">
                                <img src="img/shushva-band.jpg" alt="">
                            </div>
                            <div class="text">
                                <h4>Lorem ipsum dolor siteb amet consectetur</h4>
                                <div class="tag light-text">
                                    <i class="fa fa-tag" aria-hidden="true"></i>
                                    <span>Festival</span>
                                </div>
                                <div class="post-date light-text">
                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    <span>September 26, 2017</span>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <div class="img-container">
                                <img src="img/artsakh-fructs.jpg" alt="">
                            </div>
                            <div class="text">
                                <h4>Lorem ipsum dolor siteb amet consectetur</h4>
                                <div class="tag light-text">
                                    <i class="fa fa-tag" aria-hidden="true"></i>
                                    <span>Festival</span>
                                </div>
                                <div class="post-date light-text">
                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    <span>September 26, 2017</span>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <div class="img-container">
                                <img src="img/wine-fest-girls.jpg" alt="">
                            </div>
                            <div class="text">
                                <h4>Lorem ipsum dolor siteb amet consectetur</h4>
                                <div class="tag light-text">
                                    <i class="fa fa-tag" aria-hidden="true"></i>
                                    <span>Festival</span>
                                </div>
                                <div class="post-date light-text">
                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    <span>September 26, 2017</span>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#">
                            <div class="img-container">
                                <img src="img/tent.jpg" alt="">
                            </div>
                            <div class="text">
                                <h4>Lorem ipsum dolor siteb amet consectetur</h4>
                                <div class="tag light-text">
                                    <i class="fa fa-tag" aria-hidden="true"></i>
                                    <span>Festival</span>
                                </div>
                                <div class="post-date light-text">
                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    <span>September 26, 2017</span>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </a>
                    </div>
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
