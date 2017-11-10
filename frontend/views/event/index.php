<?php
/* @var $this yii\web\View */
$this->title = Yii::t('frontend', 'Events')
?>
<!--    <h1>--><?php //echo Yii::t('frontend', 'Events') ?><!--</h1>-->
    <section class="page-head section-img search-result">
        <div class="gradient gradient-vr-56">
            <div class="container">
                <div class="text-block">
                    <h1>Events calendar</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="project-items">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                </div>
            </div>
            <div class="row">
                <?php echo \common\widgets\ListView::widget([
                    'dataProvider'=>$dataProvider,
                    'pager'=>[
                        'hideOnSinglePage'=>true,
                    ],
                    'itemView'=>'_item',
                    'summary'=>''
                ])?>

            </div>
        </div>
    </section>