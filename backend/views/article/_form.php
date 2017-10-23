<?php

use trntv\filekit\widget\Upload;
use trntv\yii\datetime\DateTimeWidget;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use mihaildev\ckeditor\CKEditor;


/* @var $this yii\web\View */
/* @var $model common\models\Article */
/* @var $categories common\models\ArticleCategory[] */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="article-form">
    <script src="https://code.jquery.com/jquery.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'slug')
        ->hint(Yii::t('backend', 'If you\'ll leave this field empty, slug will be generated automatically'))
        ->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'category_id')->dropDownList(\yii\helpers\ArrayHelper::map(
            $categories,
            'id',
            'title'
        ), ['prompt'=>'']) ?>


    <?php echo $form->field($model, 'body')->textarea(['rows' => 6, 'id' => 'bodyId']) ?>
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
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary','onclick' => 'updateForm()']) ?>
    </div>
    <span class="btn" id="addTemplate1Id">Add tempalate</span>
    <span class="btn" id="addTemplate2Id">Add tempalate 2</span>
    <div class="clear"></div>
    <section class="template-text template-5">

    </section>
    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Modal Window</h4>
                </div>
                <div class="modal-body">
                    <form role="form">
                        <div class="form-group">
                            <label for="src" class="control-label">src:</label>
                            <input type="text" class="form-control" id="src">
                        </div>
                        <div class="form-group">
                            <label for="title" class="control-label">alt:</label>
                            <input type="text" class="form-control" id="title"></input>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="save(this)" data-dismiss="modal">Send</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        var root = document.getElementsByClassName("template-5")[0];
        var parser = new DOMParser();
        var template1String = `<div class="container">
  <div class="item">
              <div class="row" >
                <div class="col-md-7 col-sm-6 com-xs-12">
                    <h2 contenteditable="true">Lorem ipsum dolor</h2>
                    <p contenteditable="true">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent ultrices vulputate leo sed malesuada. Donec telltus massa, impe rdiet fermentum massa eu, varius elementum est. Sed blandit ipsum eros, quis vulputate purus malesuada elementum. Vestibulum lacinia nisi vel orci porta, ac dictum ligula aliquet. Aenean in est vulputate, semper leo vel, convallis dui.Nullam consectetur sagittis ante vel vestibulum. </p>
                    <p contenteditable="true">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent ultrices vulputate leo sed malesuada. Donec telltus massa, impe rdiet fermentum massa eu, varius elementum est. Sed blandit ipsum eros, quis vulputate purus malesuada elementum. Vestibulum lacinia nisi vel orci porta, ac dictum ligula aliquet. Aenean in est vulputate, semper leo vel, convallis dui. Nullam consectetur sagittis ante vel vestibulum. </p>
                </div>
                <div class="col-md-5 col-sm-6 com-xs-12">
                   <div class="img-block">
                       <img  data-toggle="modal" data-target="#myModal" data-title="Feedback" src="https://habrastorage.org/getpro/habr/post_images/c99/663/96d/c9966396d408953ac32e3aa0470b1e9e.jpg" alt="Hyunot">
                   </div>
                </div>
              </div>
           </div></div>`;

        var template2String = `<div class="img-100p">
           <div class="img-block">
               <img data-toggle="modal" data-target="#myModal" data-title="Feedback" src="https://drscdn.500px.org/photo/179316195/q%3D80_m%3D2000_k%3D1/v2?webp=true&sig=955d2fca495b3c299489291a0f9049b925bc19aec90b4aa9e39138b0a9a6fdfb" alt="Gandzasar">
           </div>
           <div class="container">
              <div class="text">
                  <h3>Lorem ipsum dolor sit ectetur adipiscing ipsum nulla</h3>
                  <div class="line"></div>
              </div>
           </div>
        </div>`;

        var selectedImg = {};
        var imgElement = {};

        $(document).ready(function () {
            $("#myModal").on('show.bs.modal', function (event) {
                imgElement = event.relatedTarget;
                selectedImg.src = event.relatedTarget.src;
                selectedImg.title = event.relatedTarget.alt;
                var button = $(event.relatedTarget);  // Button that triggered the modal
                var titleData = button.data('title'); // Extract value from data-* attributes
                $(this).find('.modal-title').text(titleData + ' Form');
                $(this).find('#src').val(selectedImg.src);
                $(this).find('#title').val(selectedImg.title);
            });
            $("#addTemplate1Id").on('click', function (event) {
                var template1 = parser.parseFromString(template1String, 'text/html');
                root.append(template1.body.firstChild);
            });
            $("#addTemplate2Id").on('click', function (event) {
                var template2 = parser.parseFromString(template2String, 'text/html');
                root.append(template2.body.firstChild);
            });
        });
        function save() {
            imgElement.src = $(event.target.parentElement.parentElement).find('#src').val();
            imgElement.title = $(event.target.parentElement.parentElement).find('#title').val();
        }

        function updateForm(){
            console.log(222);
        }

    </script>
    <?php ActiveForm::end(); ?>

</div>
