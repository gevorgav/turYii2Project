<?php

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use pceuropa\menu\Menu;
use \common\widgets\PceuropaMenu;

/* @var $this \yii\web\View */
/* @var $content string */

$this->beginContent('@frontend/views/layouts/_clear.php')
?>
    <header>
        <div class="top-header">
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
                                                            <li><a href="about/the-republic-of-artsakh">Republic of Artsakh</a></li>
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
                        <div class="col-md-3 footer-item">
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
                        <div class="col-md-3 footer-item">
                            <h3>Upcoming Events</h3>
                            <h4 class="pull-left">
                                <div class="ellipsis">
                                    <a href="#">Wine Festival</a>
                                </div>
                            </h4>
                            <h4 class="pull-right date">16 sep</h4>
                            <div class="clear"></div>
                            <p class="event-location">Location: Togh</p>
                            <div class="line"></div>
                            <h4 class="pull-left">
                                <div class="ellipsis">
                                    <a href="#">Air Fest</a>
                                </div>
                            </h4>
                            <h4 class="pull-right date">17 jun</h4>
                            <div class="clear"></div>
                            <p class="event-location">Location: Stepanakert</p>
                            <div class="line"></div>
                            <h4 class="pull-left">
                                <div class="ellipsis">
                                    <a href="#">Sculpturers Sympozium</a>
                                </div>
                            </h4>
                            <h4 class="pull-right date">8 may</h4>
                            <div class="clear"></div>
                            <p class="event-location">Location: Shoushi</p>
                        </div>
                        <div class="col-md-3 footer-item">
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