<?php

use yii\bootstrap\Nav;
use common\models\Event;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\search\GeneralSearch;

/* @var $this \yii\web\View */
/* @var $content string */

$this->beginContent('@frontend/views/layouts/_clear.php');

$upcoming = Event::find()
    ->published()
    ->andWhere(['>', '{{%event}}.event_date_time',time()] )
    ->orderBy('{{%event}}.event_date_time')
    ->limit(3)
    ->all();
$model = new GeneralSearch();
if (Yii::$app->getRequest()->getQueryParam('search') != null){
    $model->search = Yii::$app->getRequest()->getQueryParam('search');
}

?>
    <header>
        <div class="top-header hidden-xs">
            <div class="black-87">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="contact-us">
                                <a href="#">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                    Contact us
                                </a>
                            </div>
                            <div class="social-icons">
                                <a href="#">
                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-twitter" aria-hidden="true"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-youtube-play" aria-hidden="true"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-instagram" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="languages">
                                <?
                                echo Nav::widget([
                                    'options' => ['class' => ''],
                                    'items' => [
                                        [
                                            'label'=>Yii::t('frontend', ''.Yii::$app->params['availableLocales'][Yii::$app->language]),
                                            'items'=>array_map(function ($code) {
                                                return [
                                                    'label' => Yii::$app->params['availableLocales'][$code],
                                                    'url' => ['/site/set-locale', 'locale'=>$code],
                                                    'active' => Yii::$app->language === $code
                                                ];
                                            }, array_keys(Yii::$app->params['availableLocales']))
                                        ]
                                    ]
                                ]);
                                ?>
<!--                                <a href="#">-->
<!---->
<!--                                    <i class="" aria-hidden="true"></i>                  English-->
<!--                                </a>-->
                            </div>
                            <div class="calendar">
                                <a href="/events">
                                    <i class="fa fa-calendar-o" aria-hidden="true"></i>
                                    Calendar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-header">
            <nav class="navbar navbar-default">
              <div class="container">
                 <div class="menu-block">
                    <div class="navbar-header hidden-sm">
                      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span> 
                      </button>
                      <a class="navbar-brand" href="/">
                          <img src="/img/main-logo-01-beta.svg" alt="Artsakh travel">
                      </a>
                    </div>
                    <div class="collapse navbar-collapse" id="myNavbar">
                      <ul class="nav navbar-nav">
                        <li class="dropdown active">
                            <a href="#">About Artsakh</a>
                            <ul class="dropdown-menu">
                                <li><a href="/about/the-republic-of-artsakh">Republic of Artsakh</a></li>
                                <li><a href="/about/from-the-bronze-ages-to-nowadays">From the Bronze age to Nowadays</a></li>
                                <li><a href="/about/geographical-facts">Geographic facts</a></li>
                                <li><a href="/about/religion">Religion</a></li>
                                <li><a href="/about/national-holidays-and-festivals">National holidays and festivals</a> </li>
<!--                                <li><a href="#">Here we are</a></li>-->
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#">Discover</a>
                            <ul class="dropdown-menu">
                                <li class=""><a href="/regions">Regions</a></li>
                                <li class=""><a href="/discover/culture">Culture</a></li>
                                <li><a href="/discover/cuisine">Cuisine</a></li>
                                <li><a href="/discover/carpets">Carpets</a></li>
                                <li><a href="/discover/fancywork">Fancywork</a></li>
                                <li><a href="/discover/karabakh-horses">Karabakh horses</a> </li>
<!--                                <li><a href="#">Traces of Great Silk Route</a></li>-->
                                <li><a href="/discover/multicultural-heritage-of-artsakh">Multicultural heritage of Artsakh</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#">Travel routes</a>
                            <ul class="dropdown-menu">
                                <li><a href="/travel-routes/on-your-way-to-stepanakert">On your way to Stepanakert</a></li>
                                <li><a href="/travel-routes/south-tourist-route">Southern travel route</a></li>
                                <li><a href="/travel-routes/northern-tourist-route">Northern Travel route</a></li>
                                <li><a href="/travel-routes/highway-stepanakert-martakert">Stepanakert-Martakert highway</a></li>
<!--                                <li><a href="#">Stepanakert-Martuni highway</a> </li>-->
                            </ul>
                        </li> 
                        <li class="dropdown">
                            <a href="#">Plan your trip</a>
                            <ul class="dropdown-menu">
                                <li><a href="/plan-your-trip/getting-there">Getting there</a></li>
                                <li><a href="/plan-your-trip/entry-formalities">Entry formalities</a></li>
                                <li><a href="#">Acommodation</a></li>
                                <li><a href="/plan-your-trip/useful">Useful information</a> </li>
                                <li><a href="/plan-your-trip/find-me-a-guide">Find me a guide</a></li>
                                <li><a href="/plan-your-trip/touroperators">Touroperators</a></li>
                                <li><a href="#">Transportation companies</a></li>
                                <li><a href="#">FAQ</a></li>
                            </ul>
                        </li> 
                        <li class="dropdown">
                            <a href="#">Things to do</a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Cafes and Restaurants</a></li>
                                <li><a href="/things-to-do/museums">Museums and Theatres</a></li>
                                <li><a href="/things-to-do/cultural-sightseeing">Cultural sightseeing</a></li>
                                <li><a href="/things-to-do/archaeological-tourism">Archaeological sightseeing</a></li>
                                <li><a href="/things-to-do/agrotourism">Agrotourism</a> </li>
                                <li><a href="/things-to-do/adventure">Adventures</a></li>
                                <li><a href="/things-to-do/religious-tourism">Religious tourism</a></li>
                            </ul>
                        </li>
                      </ul>
                    </div>
                     <?php if ($model->search == null){?>
                         <?php $form = ActiveForm::begin();?>
                            <div class="search hidden-sm hidden-xs">
                                <?= $form->field($model, 'search')->textInput(['class'=> 'search-input','style'=>'width: 90%;line-height: 30px;', 'placeholder'=>Yii::t('frontend', 'Search')])->label('')?>
        <!--                        <i class="fa fa-search" aria-hidden="true"></i>-->
                            </div>
                         <?php ActiveForm::end();?>
                    <?php }?>
                 </div>
              </div>
            </nav>
<!--
            <nav class="navbar navbar-default">
                <div class="container">
                    <div class="menu-block">
                        <div class="navbar-header hidden-md">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand hidden-sm hidden-xs" href="<?= Yii::$app->homeUrl?>">
                                <img src="/img/main-logo-01.svg" alt="Artsakh travel">
                            </a>
                        </div>
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li>
                                    <a href="#">About Artsakh</a>
                                    <div class="dropdown-menu-box">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-offset-2 col-md-4 dropdown-links">
                                                    <div class="ul-item">
                                                        <ul>
                                                            <li><a href="/about/the-republic-of-artsakh">Republic of Artsakh</a></li>
                                                            <li><a href="#">From the Bronze age to Nowadays</a></li>
                                                            <li><a href="#">Geographic facts</a></li>
                                                            <li><a href="#">Religion</a></li>
                                                            <li><a href="#">National holidays and festivals</a> </li>
                                                            <li><a href="#">Here we are</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 nav-img">
                                                    <a href="#" class="nav-img-item-link">
                                                        <div class="nav-img-item item-1">
                                                            <div class="black-57 flex-center-center">
                                                                <h4>Upcoming Events</h4>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="#" class="nav-img-item-link">
                                                        <div class="nav-img-item item-2">
                                                            <div class="black-57 flex-center-center">
                                                                <h4>Tourism Information Centes</h4>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <span class="manu-bg-text">About Artsakh</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a href="#">Discover</a>
                                    <div class="dropdown-menu-box">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-offset-2 col-md-4 dropdown-links">
                                                    <div class="ul-item">
                                                        <ul>
                                                            <li class=""><a href="/regions">Regions</a></li>
                                                            <li class=""><a href="#">Culture</a></li>
                                                            <li><a href="#">Cuisine</a></li>
                                                            <li><a href="#">Carpets</a></li>
                                                            <li><a href="#">Fancywork</a></li>
                                                            <li><a href="#">Karabakh horses</a> </li>
                                                            <li><a href="#">Traces of Great Silk Route</a></li>
                                                            <li><a href="#">Multicultural Artsakh</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 nav-img">
                                                    <a href="#" class="nav-img-item-link">
                                                        <div class="nav-img-item item-1">
                                                            <div class="black-57 flex-center-center">
                                                                <h4>Upcoming Events</h4>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="#" class="nav-img-item-link">
                                                        <div class="nav-img-item item-2">
                                                            <div class="black-57 flex-center-center">
                                                                <h4>Tourism Information Centes</h4>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <span class="manu-bg-text">Discover</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a href="#">Travel routes</a>
                                    <div class="dropdown-menu-box">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-offset-2 col-md-4 dropdown-links">
                                                    <div class="ul-item">
                                                        <ul>
                                                            <li><a href="#">On your way to Stepanakert</a></li>
                                                            <li><a href="#">Southern travel route</a></li>
                                                            <li><a href="#">Northern Travel route</a></li>
                                                            <li><a href="#">Stepanakert-Martakert highway</a></li>
                                                            <li><a href="#">Stepanakert-Martuni highway</a> </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 nav-img">
                                                    <a href="#" class="nav-img-item-link">
                                                        <div class="nav-img-item item-1">
                                                            <div class="black-57 flex-center-center">
                                                                <h4>Upcoming Events</h4>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="#" class="nav-img-item-link">
                                                        <div class="nav-img-item item-2">
                                                            <div class="black-57 flex-center-center">
                                                                <h4>Tourism Information Centes</h4>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <span class="manu-bg-text">Travel routes</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a href="#">Things to do</a>
                                    <div class="dropdown-menu-box">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-offset-2 col-md-4 dropdown-links">
                                                    <div class="ul-item">
                                                        <ul>
                                                            <li><a href="#">Cafes and Restaurants</a></li>
                                                            <li><a href="#">Museums and Theatres</a></li>
                                                            <li><a href="#">Cultural sightseeing</a></li>
                                                            <li><a href="#">Archaeological sightseeing</a></li>
                                                            <li><a href="#">Ecotourism</a> </li>
                                                            <li><a href="#">Adventures</a></li>
                                                            <li><a href="#">Piligrimage</a></li>
                                                            <li><a href="#">Hunting and Fishing</a></li>
                                                            <li><a href="#">Historical-military tourism</a></li>
                                                            <li><a href="#">Shopping</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 nav-img">
                                                    <a href="#" class="nav-img-item-link">
                                                        <div class="nav-img-item item-1">
                                                            <div class="black-57 flex-center-center">
                                                                <h4>Upcoming Events</h4>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="#" class="nav-img-item-link">
                                                        <div class="nav-img-item item-2">
                                                            <div class="black-57 flex-center-center">
                                                                <h4>Tourism Information Centes</h4>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <span class="manu-bg-text">Things to do</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a href="#">Plan your trip</a>
                                    <div class="dropdown-menu-box">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-offset-2 col-md-4 dropdown-links">
                                                    <div class="ul-item">
                                                        <ul>
                                                            <li><a href="#">Getting there</a></li>
                                                            <li><a href="#">Entry formalities</a></li>
                                                            <li><a href="#">Acommodation</a></li>
                                                            <li><a href="#">First trip</a></li>
                                                            <li><a href="#">Useful information</a> </li>
                                                            <li><a href="#">Find me a guide</a></li>
                                                            <li><a href="#">Touroperators</a></li>
                                                            <li><a href="#">FAQ</a></li>
                                                            <li><a href="#">Transportation companies</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 nav-img">
                                                    <a href="#" class="nav-img-item-link">
                                                        <div class="nav-img-item item-1">
                                                            <div class="black-57 flex-center-center">
                                                                <h4>Upcoming Events</h4>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href="#" class="nav-img-item-link">
                                                        <div class="nav-img-item item-2">
                                                            <div class="black-57 flex-center-center">
                                                                <h4>Tourism Information Centes</h4>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <span class="manu-bg-text">Travel routes</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="search">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </nav>
-->
        </div>
    </header>

<!--    --><?//
//        NavBar::begin(['brandLabel' => 'Travel Artsakh','brandUrl' => Yii::$app->homeUrl,]);
//
//        echo Nav::widget([ 'options' => ['class' => 'navbar-nav navbar-left'],
//                            'items' => PceuropaMenu::NavbarLeft(1)  // argument is id of menu
//                        ]);
//
////        echo Nav::widget([ 'options' => ['class' => 'navbar-nav navbar-right'],
////                            'items' => Menu::NavbarRight(1)
////                        ]);
//        echo Nav::widget([
//                            'options' => ['class' => 'navbar-nav navbar-right'],
//                            'items' => [
//                                [
//                                    'label'=>Yii::t('frontend', 'Language'),
//                                    'items'=>array_map(function ($code) {
//                                        return [
//                                            'label' => Yii::$app->params['availableLocales'][$code],
//                                            'url' => ['/site/set-locale', 'locale'=>$code],
//                                            'active' => Yii::$app->language === $code
//                                        ];
//                                    }, array_keys(Yii::$app->params['availableLocales']))
//                                ]
//                            ]
//                        ]);
//        NavBar::end();
//    ?>



    <?php echo $content ?>


    <footer>
        <div class="top-footer">
            <div class="blue-87">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-12 footer-item">
                            <div class="footer-logo"></div>
                            <p>We would be more than happy to help you. Our team advisor are 24/7 at your service to help you.</p>
                            <div class="line"></div>
                            <div>
                                <a href="#">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                    support@gmail.com
                                </a>
                            </div>
                            <div class="line"></div>
                            <div>
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <span>+374 97 000 000</span>
                            </div>
                            <div class="line"></div>
                            <div>
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <span>24/2 Lusavorich St - Stepanakert</span>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12 footer-item">
                            <h3><?=Yii::t('frontend', 'Upcoming Events')?></h3>

                            <?php foreach ($upcoming as $key => $item): ?>

                                <h4 class="pull-left">
                                    <div class="ellipsis">
                                        <?php echo Html::a( $item->getMultilingual('title', YII::$app->language), ['/events/'.$item->slug],['class'=>'calendar-visit-event']) ?>
                                    </div>
                                </h4>
                                <h4 class="pull-right date"><?php echo Yii::$app->formatter->asDate($item->event_date_time, "d MMM") ?></h4>
                                <div class="clear"></div>
                                <p class="event-location"><?= Yii::t('frontend', 'Location').': '.$item->getMultilingual('location_name', YII::$app->language)?></p>
                                <div class="line"></div>

                            <?php endforeach;?>
                        </div>
                        <div class="col-md-3 col-sm-12 footer-item">
                            <h3>Site Map</h3>
                            <ul class="first-list">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                                        Region
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                                        Culture
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                                        Museumst
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                                        Theatres
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                                        Hotels
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                                        Cuisine
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                                        Events
                                    </a>
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                                        Region
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                                        Culture
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                                        Museumst
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                                        Theatres
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                                        Hotels
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                                        Cuisine
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                                        Events
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <?= common\widgets\SubscriptionWidget::widget() ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-footer">
            <div class="container">
                <div class="pull-left">
                    <p>Copyright 2017 © WebArtsakh. All rights reserved</p>
                </div>
                <div class="pull-right">
                    <p>Follow us:</p>
                    <div class="social-icons">
                        <a href="#">
                            <i class="fa fa-facebook" aria-hidden="true"></i>
                        </a>
                        <a href="#">
                            <i class="fa fa-twitter" aria-hidden="true"></i>
                        </a>
                        <a href="#">
                            <i class="fa fa-youtube-play" aria-hidden="true"></i>
                        </a>
                        <a href="#">
                            <i class="fa fa-instagram" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
<?php $this->endContent() ?>