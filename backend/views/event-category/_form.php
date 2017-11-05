<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ArticleCategory */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $categories array */
?>

<div class="article-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <h2>Dynamic Tabs</h2>
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#home">English</a></li>
        <li><a data-toggle="tab" href="#menu1">Հայերեն</a></li>
        <li><a data-toggle="tab" href="#menu2">Русский</a></li>
        <li><a data-toggle="tab" href="#menu3">Deutsch</a></li>
        <li><a data-toggle="tab" href="#menu4">Français</a></li>
        <li><a data-toggle="tab" href="#menu5">Español</a></li>
        <li><a data-toggle="tab" href="#menu6">العربية</a></li>
        <li><a data-toggle="tab" href="#menu7">Iranian</a></li>
    </ul>

    <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
            <?php echo $form->field($model, 'title_en')->textInput(['maxlength' => 512]) ?>
        </div>
        <div id="menu1" class="tab-pane fade">
            <?php echo $form->field($model, 'title_hy')->textInput(['maxlength' => 512]) ?>
        </div>
        <div id="menu2" class="tab-pane fade">
            <?php echo $form->field($model, 'title_ru')->textInput(['maxlength' => 512]) ?>
        </div>
        <div id="menu3" class="tab-pane fade">
            <?php echo $form->field($model, 'title_de')->textInput(['maxlength' => 512]) ?>
        </div>
        <div id="menu4" class="tab-pane fade">
            <?php echo $form->field($model, 'title_fr')->textInput(['maxlength' => 512]) ?>
        </div>
        <div id="menu5" class="tab-pane fade">
            <?php echo $form->field($model, 'title_es')->textInput(['maxlength' => 512]) ?>
        </div>
        <div id="menu6" class="tab-pane fade">
            <?php echo $form->field($model, 'title_ar')->textInput(['maxlength' => 512]) ?>
        </div>
        <div id="menu7" class="tab-pane fade">
            <?php echo $form->field($model, 'title_ir')->textInput(['maxlength' => 512]) ?>
        </div>
    </div>

    <?php echo $form->field($model, 'slug')
        ->hint(Yii::t('backend', 'If you\'ll leave this field empty, slug will be generated automatically'))
        ->textInput(['maxlength' => 1024]) ?>

    <?php echo $form->field($model, 'parent_id')->dropDownList($categories, ['prompt'=>'']) ?>

    <?php echo $form->field($model, 'status')->checkbox() ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
