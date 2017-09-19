<?php

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use pceuropa\menu\Menu;

/* @var $this \yii\web\View */
/* @var $content string */

$this->beginContent('@frontend/views/layouts/_clear.php')
?>
<div class="wrap">
    
    <? 
        NavBar::begin(['brandLabel' => 'Brand','brandUrl' => Yii::$app->homeUrl,]);

        echo Nav::widget([ 'options' => ['class' => 'navbar-nav navbar-left'],
                            'items' => Menu::NavbarLeft(1)  // argument is id of menu
                        ]); 
                            
        echo Nav::widget([ 'options' => ['class' => 'navbar-nav navbar-right'],
                            'items' => Menu::NavbarRight(1)
                        ]);
        NavBar::end();
    ?>

    <?php echo $content ?>

</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?php echo date('Y') ?></p>
        <p class="pull-right"><?php echo Yii::powered() ?></p>
    </div>
</footer>
<?php $this->endContent() ?>