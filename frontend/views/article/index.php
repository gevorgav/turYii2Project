<?php
/* @var $this yii\web\View */
$this->title = Yii::t('frontend', 'Articles');

$mystring = 'bdacasd';
$findme   = 'a';
echo strpos($mystring, $findme, 2);
$pos = 0;
foreach ($dataProvider->getModels() as $model){
    $pos++;

    $findTitle   = '#title'.$pos;
    $category->body = str_replace($findTitle , $model->getMultilingual('title', Yii::$app->language), $category->body);

    $findLink   = '#link'.$pos;
    $category->body = str_replace($findLink , $model->category->slug.'/'. $model->slug, $category->body);

    $findImage   = '#image'.$pos;
    $category->body = str_replace($findImage , $model->thumbnail_base_url.'/'.$model->thumbnail_path , $category->body);

    $findShortDescription   = '#short_description'.$pos;
    $category->body = str_replace($findShortDescription , $model->getMultilingual('short_description', Yii::$app->language), $category->body);
}
?>

<?php echo $category->body ?>
<div id="article-index">
    <h1><?php echo Yii::t('frontend', 'Articles') ?></h1>
    <?php echo \yii\widgets\ListView::widget([
        'dataProvider'=>$dataProvider,
        'pager'=>[
            'hideOnSinglePage'=>true,
        ],
        'itemView'=>'_item'
    ])?>
</div>