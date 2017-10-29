<?php
/* @var $this yii\web\View */
$this->title = Yii::t('frontend', 'Events')
?>
<div id="article-index">
    <h1><?php echo Yii::t('frontend', 'Events') ?></h1>
    <?php echo \yii\widgets\ListView::widget([
        'dataProvider'=>$dataProvider,
        'pager'=>[
            'hideOnSinglePage'=>true,
        ],
        'itemView'=>'_item'
    ])?>
</div>