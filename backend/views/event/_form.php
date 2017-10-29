<?php

use trntv\filekit\widget\Upload;
use trntv\yii\datetime\DateTimeWidget;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


/* @var $this yii\web\View */
/* @var $model common\models\Event */
/* @var $categories common\models\ArticleCategory[] */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="article-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'slug')
        ->hint(Yii::t('backend', 'If you\'ll leave this field empty, slug will be generated automatically'))
        ->textInput(['maxlength' => true]) ?>

    <div class="">
        <h3>Multilingual inputs</h3>
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home">English</a></li>
            <li><a data-toggle="tab" href="#menu2">Հայերեն</a></li>
            <li><a data-toggle="tab" href="#menu3">Русский</a></li>
            <li><a data-toggle="tab" href="#menu4">Deutsch</a></li>
            <li><a data-toggle="tab" href="#menu5">Français</a></li>
            <li><a data-toggle="tab" href="#menu6">Español</a></li>
            <li><a data-toggle="tab" href="#menu7">العربية</a></li>
            <li><a data-toggle="tab" href="#menu8">Iranian</a></li>
        </ul>

        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                <?php echo $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'short_description_en')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'body_en')->textArea() ?>
                <?php echo $form->field($model, 'agenda_en')->textArea() ?>
                <?php echo $form->field($model, 'location_name_en')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'address_en')->textInput(['maxlength' => true]) ?>
            </div>
            <div id="menu2" class="tab-pane fade">
                <?php echo $form->field($model, 'title_hy')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'short_description_hy')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'body_hy')->textArea() ?>
                <?php echo $form->field($model, 'agenda_hy')->textArea() ?>
                <?php echo $form->field($model, 'location_name_hy')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'address_hy')->textInput(['maxlength' => true]) ?>
            </div>
            <div id="menu3" class="tab-pane fade">
                <?php echo $form->field($model, 'title_ru')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'short_description_ru')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'body_ru')->textArea() ?>
                <?php echo $form->field($model, 'agenda_ru')->textArea() ?>
                <?php echo $form->field($model, 'location_name_ru')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'address_ru')->textInput(['maxlength' => true]) ?>
            </div>
            <div id="menu4" class="tab-pane fade">
                <?php echo $form->field($model, 'title_de')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'short_description_de')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'body_de')->textArea() ?>
                <?php echo $form->field($model, 'agenda_de')->textArea() ?>
                <?php echo $form->field($model, 'location_name_de')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'address_de')->textInput(['maxlength' => true]) ?>
            </div>
            <div id="menu5" class="tab-pane fade">
                <?php echo $form->field($model, 'title_fr')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'short_description_fr')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'body_fr')->textArea() ?>
                <?php echo $form->field($model, 'agenda_fr')->textArea() ?>
                <?php echo $form->field($model, 'location_name_fr')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'address_fr')->textInput(['maxlength' => true]) ?>
            </div>
            <div id="menu6" class="tab-pane fade">
                <?php echo $form->field($model, 'title_es')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'short_description_es')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'body_es')->textArea() ?>
                <?php echo $form->field($model, 'agenda_es')->textArea() ?>
                <?php echo $form->field($model, 'location_name_es')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'address_es')->textInput(['maxlength' => true]) ?>
            </div>
            <div id="menu7" class="tab-pane fade">
                <?php echo $form->field($model, 'title_ar')->textInput(['maxlength' => true,'dir'=>'rtl']) ?>
                <?php echo $form->field($model, 'short_description_ar')->textInput(['maxlength' => true,'dir'=>'rtl']) ?>
                <?php echo $form->field($model, 'body_ar')->textArea(['dir'=>'rtl']) ?>
                <?php echo $form->field($model, 'agenda_ar')->textArea(['dir'=>'rtl']) ?>
                <?php echo $form->field($model, 'location_name_ar')->textInput(['maxlength' => true,'dir'=>'rtl']) ?>
                <?php echo $form->field($model, 'address_ar')->textInput(['maxlength' => true,'dir'=>'rtl']) ?>
            </div>
            <div id="menu8" class="tab-pane fade">
                <?php echo $form->field($model, 'title_ir')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'short_description_ir')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'body_ir')->textArea() ?>
                <?php echo $form->field($model, 'agenda_ir')->textArea() ?>
                <?php echo $form->field($model, 'location_name_ir')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'address_ir')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
    </div>

    <?php echo $form->field($model, 'category_id')->dropDownList(\yii\helpers\ArrayHelper::map(
            $categories,
            'id',
            'title_en'
        ), ['prompt'=>'']) ?>


    <?php echo $form->field($model, 'thumbnail')->widget(
        Upload::className(),
        [
            'url' => ['/file-storage/upload'],
            'maxFileSize' => 5000000, // 5 MiB
        ]);
    ?>

    <?php echo $form->field($model, 'attachments')->widget(
        Upload::className(),
        [
            'url' => ['/file-storage/upload'],
            'sortable' => true,
            'maxFileSize' => 10000000, // 10 MiB
            'maxNumberOfFiles' => 10
        ]);
    ?>

    <?php echo $form->field($model, 'event_date_time')->widget(
        DateTimeWidget::className(),
        [
            'phpDatetimeFormat' => 'yyyy-MM-dd\'T\'HH:mm:ssZZZZZ'
        ]
    ) ?>

    <?php echo $form->field($model, 'view')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'status')->checkbox() ?>

    <?php echo $form->field($model, 'published_at')->widget(
        DateTimeWidget::className(),
        [
            'phpDatetimeFormat' => 'yyyy-MM-dd\'T\'HH:mm:ssZZZZZ'
        ]
    ) ?>

    <div class="form-group">
        <?php echo Html::submitButton(
            $model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'),
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
