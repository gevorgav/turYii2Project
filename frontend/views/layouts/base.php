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
                                <a href="#">
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
                        <div class="col-md-3 footer-item">
                            <h3>Get our neewsletter</h3>
                            <p>Enter your email address for our mailing list to keep yourself updated.</p>
                            <div class="input-with-button">
                                <input type="text" placeholder="Email address">
                                <button>done</button>
                            </div>
                        </div>
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