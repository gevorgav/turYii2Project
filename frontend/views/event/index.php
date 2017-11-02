<?php
/* @var $this yii\web\View */
$this->title = Yii::t('frontend', 'Events')
?>
<div id="article-index">
<!--    <h1>--><?php //echo Yii::t('frontend', 'Events') ?><!--</h1>-->

    <section class="project-items">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                </div>
            </div>
            <div class="row">
                <?php echo \yii\widgets\ListView::widget([
                    'dataProvider'=>$dataProvider,
                    'pager'=>[
                        'hideOnSinglePage'=>true,
                    ],
                    'itemView'=>'_item'
                ])?>
            </div>
        </div>
    </section>

</div>