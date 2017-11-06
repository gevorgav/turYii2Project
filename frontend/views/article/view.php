<?php
/* @var $this yii\web\View */
/* @var $model common\models\Article */
$this->title = $model->title_en;
//$this->params['breadcrumbs'][] = ['label' => Yii::t('frontend', 'Articles'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>

<section class="template page-head section-img">
    <?php if ($model->thumbnail_path): ?>
        <?php echo \yii\helpers\Html::img(
            Yii::$app->glide->createSignedUrl([
                'glide/index',
                'path' => $model->thumbnail_path,
                'w' => 200
            ], true),
            ['class' => 'article-thumb img-rounded pull-left']
        ) ?>
    <?php endif; ?>
    <div class="gradient gradient-vr-56">
        <div class="container">
            <div class="text-block">
                <h1><?php echo $model->title_en ?></h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent ultrices vulputate sed malesuada.</p>
            </div>
        </div>
    </div>
</section>
<section class="template-text">




        <?php echo $model->body_en ?>

        <?php if (!empty($model->articleAttachments)): ?>
            <h3><?php echo Yii::t('frontend', 'Attachments') ?></h3>
            <ul id="article-attachments">
                <?php foreach ($model->articleAttachments as $attachment): ?>
                    <li>
                        <?php echo \yii\helpers\Html::a(
                            $attachment->name,
                            ['attachment-download', 'id' => $attachment->id])
                        ?>
                        (<?php echo Yii::$app->formatter->asSize($attachment->size) ?>)
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
</section>