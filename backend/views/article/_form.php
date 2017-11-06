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

    <?php echo $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'slug')
        ->hint(Yii::t('backend', 'If you\'ll leave this field empty, slug will be generated automatically'))
        ->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'category_id')->dropDownList(\yii\helpers\ArrayHelper::map(
            $categories,
            'id',
            'title_en'
        ), ['prompt'=>'']) ?>

    <?php echo $form->field($model, 'short_description_en')->textInput(['rows' => 6, 'maxlength' => true]) ?>

    <?php echo $form->field($model, 'body_en')->textArea(['rows' => 6, 'id' => 'bodyId']) ?>
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
    <section class="template-text">

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
        var root = document.getElementsByClassName("template-text")[0];
        var parser = new DOMParser();
        var template1String = `<div class="template-1">
            <div class="container">
               <div class="item">
                  <div class="row">
                    <div class="col-md-7 col-sm-6 com-xs-12" contenteditable="true">
                        <p >Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent ultrices vulputate leo sed malesuada. Donec telltus massa, impe rdiet fermentum massa eu, varius elementum est. Sed blandit ipsum eros, quis vulputate purus malesuada elementum. Vestibulum lacinia nisi vel orci porta, ac dictum ligula aliquet. Aenean in est vulputate, semper leo vel, convallis dui.Nullam consectetur sagittis ante vel vestibulum. </p>
                    </div>
                    <div class="col-md-5 col-sm-6 com-xs-12">
                       <div class="img-block">
                           <img  data-toggle="modal" data-target="#myModal" data-title="Feedback" src="https://habrastorage.org/getpro/habr/post_images/c99/663/96d/c9966396d408953ac32e3aa0470b1e9e.jpg" alt="Hyunot">
                       </div>
                    </div>
                  </div>
               </div>
            </div>
        </div>`;

        var template2String = `<div class="template-5">
        <div class="container">
            <div class="row" >
                <div class="col-sm-12" contenteditable="true">
                    <h2>История</h2>
                </div>
                <div class="col-md-6 col-sm-12" contenteditable="true">
                    <p>Арцах расположенв  холмистой местности на юго-востоке Малого Кавказа, на крайне-восточном отрезке Великого Айка.На западе его  границы доходят  до восточных берегов озера Севан, к юго-западу – до реки Агавно /Агарь/, на юге- до реки Ерасх / Аракс/, к востоку углубляются в Муганьскую степь, а с севера огражденыKарабахским  хребтом. Археологические материалы, армянские и другие источники свидетельствуют о том, что человек в Арцахе перманентнопроживал в древние времена. Здесь вы можете найти руины и следы населенныхпунктов, замков, отдельных построек, различное  оружие, ювелирные изделия, инструменты, обнаруженные под глубоким слоем земли. Особый интерес представляют материалы, обнаруженные в пещере Азохэпохи палеолита в Гадрутском районе, останки доисторического человека /неандертальца/. Сегодня археологи Англии и  Испании, совместно с армянскими археологами проводят раскопки здесь и открывают новые следы жизни и деятельности древнего человека. Арцахские горы богаты памятниками, особенно резьбой по камню. Хронология их обширна и, начиная с 7-го тысячелетиядо н.э. достигает 1-го тысячелетия: Резьбой по камню особенно богат  Карвачарский район и окрестности села Тагут Гадруского района.
                     </p>
                </div>
                <div class="col-md-6 col-sm-12" contenteditable="true">
                    <p>В Бронзовом веке в Восточных Армянских провинциях строились циклопические крепости. В Кашатагском районе,  на левом берегу реки Очанц, сохранилась одна из таких крепостей.В 3-1 тысячелетиидо н.э. на Армянском нагорьепоявились первые государственные образования, в числе которых особое место и роль отводилос Урарту или Ванскому или АраратскомуЦарству.В годы правления Аргишти 1-гоАрцах находился в составе государства Урарту, о чем свидетельствует летопись Аргишти 1-го, найденная в Котайке, в которой упоминается город Зар. Название города совпадает со средневековым арцахским меликством Цар и современным селом Цар Карвачарского района.Во времена следующих армянских царских династий -Ервандидов и Арташесидов –Арцах и Утик продолжали оставаться в составе объединенного царства.Греческие и римские историки предполагают, что восточные границы Армении проходили по реке Кура.НезавершенныеделаАрташеса 5-гопродолжил его внук Тигран II Великий, и все наиболее расширив границы государства, создал Армению  от моря до моря. Обширное государство было вовлечено в  эллинистическую культуру, одной из характеристик которой являлось градостроительство.Тигран Великий построил 4 города в исконной Армении и назвал своим именем -Тигранакерт. Один из этих городов  был построен в Арцахе у подножия Ванкасара.</p>
                </div>
            </div>
        </div>
        <div class="img-100p">
           <div class="img-block">
               <img  data-toggle="modal" data-target="#myModal" data-title="Feedback" src="https://habrastorage.org/getpro/habr/post_images/c99/663/96d/c9966396d408953ac32e3aa0470b1e9e.jpg" alt="Hyunot">
           </div>
           <div class="container">
              <div class="text">
                  <h3>Lorem ipsum dolor sit ectetur adipiscing ipsum nulla</h3>
                  <div class="line"></div>
              </div>
           </div>
        </div>

       </div>`;

        var template3String = `<div class="template-3">
        <div class="container">
            <div class="title-block">
                <div class="item"></div>
                <div class="item">
                    <h2 contenteditable="true">Lorem ipsum dolor sit amet</h2>
                </div>
                <div class="item">
                    <div class="line"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                   <div class="img-block">
                       <img src="img/tnjri.jpg" alt="Tnjri">
                   </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 right-text">
                    <div class="item">
                     <p contenteditable="true">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent ultrices vulputate leo sed malesuada. Donec telltus massa, impe rdiet fermentum massa eu, varius elementum est. Sed blandit ipsum eros, quis vulputate purus malesuada elementum. Vestibulum lacinia nisi vel orci porta, ac dictum ligula aliquet. Aenean in est vulputate, semper leo vel, convallis dui. Aenean metus lectus, volutpat in arcu nec, accumsan molestie nulla. Nullam consectetur sagittis ante vel vestibulum. Semper leo vel, convallis dui. Aenean metus lectus, volutpat in arcu nec, accumsan molestie nulla. Nullam consectetur sagittis ante vel vestibulum. Accumsan molestie nulla. Nullam consectetur sagittis ante vel vestibulum. Semper leo vel, convallis dui. Aenean metus lectus, volutpat in arcu nec, accumsan molestie nulla. Nullam consectetur sagittis ante vel vestibulum.</p>
                    </div>
                    <div class="item">
                     <h3 contenteditable="true">Lorem ipsum dolor sit amet</h3>
                     <p contenteditable="true">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent ultrices vulputate leo sed malesuada. Donec telltus massa, impe rdiet fermentum massa eu, varius elementum est. Sed blandit ipsum eros, quis vulputate purus malesuada elementum. Vestibulum lacinia nisi vel orci porta, ac dictum ligula aliquet. Aenean in est vulputate, semper leo vel, convallis dui. Aenean metus lectus, volutpat in arcu nec, accumsan molestie nulla. Nullam consectetur sagittis ante vel vestibulum. Semper leo vel, convallis dui. Aenean metus lectus, volutpat in arcu nec, accumsan molestie nulla. Nullam consectetur sagittis ante vel vestibulum. Accumsan molestie nulla. Nullam consectetur sagittis ante vel vestibulum. Semper leo vel, convallis dui. Aenean metus lectus, volutpat in arcu nec, accumsan molestie nulla. Nullam consectetur sagittis ante vel vestibulum.</p>
                    </div>
                </div>
            </div>
        </div>
       </div>`;

        var selectedImg = {};
        var imgElement = {};
        var list = [];
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
                var template1 = parser.parseFromString(template1String, 'text/html').body.firstChild;
                list.push(template1);
                let i = list.indexOf(template1);
                var deletes = parser.parseFromString("<a onclick='deleteElelement(this)' ><span class='glyphicon glyphicon-remove'></span></a>", 'text/html').body.firstChild;
                root.append(template1);
                root.append(deletes);

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
            debugger;
            $( "*[contenteditable*=true]" ).each(function (item, item2){
                $(item2).attr("contenteditable", false);
            });
            $("#bodyId").html($(".template-text").html());
        }

        function deleteElelement(el) {
            el.previousSibling.remove();
            el.remove();
        }

        root.append(parser.parseFromString($("#bodyId").text(), 'text/html').body);
        $( "*[contenteditable*=false]" ).each(function (item, item2){
            $(item2).attr("contenteditable", true);
        });

    </script>
    <?php ActiveForm::end(); ?>

</div>
