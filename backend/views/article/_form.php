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

    <?php echo $form->field($model, 'slug')
        ->hint(Yii::t('backend', 'If you\'ll leave this field empty, slug will be generated automatically'))
        ->textInput(['maxlength' => true]) ?>

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

    <?php echo $form->field($model, 'view')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'status')->checkbox() ?>

    <?php echo $form->field($model, 'published_at')->widget(
        DateTimeWidget::className(),
        [
            'phpDatetimeFormat' => 'yyyy-MM-dd\'T\'HH:mm:ssZZZZZ'
        ]
    ) ?>


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
                <?php echo $form->field($model, 'keywords_en')
                    ->hint('Please enter the keyword with commas')
                    ->textInput(['maxlength' => true]) ?>
                <section class="template-text" id="template_en" lang="en">

                </section>
            </div>
            <div id="menu2" class="tab-pane fade">
                <?php echo $form->field($model, 'title_hy')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'short_description_hy')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'body_hy')->textArea() ?>
                <?php echo $form->field($model, 'keywords_hy')->hint('Please enter the keyword with commas')->textInput(['maxlength' => true]) ?>
                <section class="template-text" id="template_hy" lang="hy">

                </section>
            </div>
            <div id="menu3" class="tab-pane fade">
                <?php echo $form->field($model, 'title_ru')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'short_description_ru')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'body_ru')->textArea() ?>
                <?php echo $form->field($model, 'keywords_ru')->hint('Please enter the keyword with commas')->textInput(['maxlength' => true]) ?>
                <section class="template-text" id="template_ru" lang="ru">

                </section>
            </div>
            <div id="menu4" class="tab-pane fade">
                <?php echo $form->field($model, 'title_de')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'short_description_de')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'body_de')->textArea() ?>
                <?php echo $form->field($model, 'keywords_de')->hint('Please enter the keyword with commas')->textInput(['maxlength' => true]) ?>
                <section class="template-text" id="template_de" lang="de">

                </section>
            </div>
            <div id="menu5" class="tab-pane fade">
                <?php echo $form->field($model, 'title_fr')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'short_description_fr')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'body_fr')->textArea() ?>
                <?php echo $form->field($model, 'keywords_fr')->hint('Please enter the keyword with commas')->textInput(['maxlength' => true]) ?>
                <section class="template-text" id="template_fr" lang="fr">

                </section>
            </div>
            <div id="menu6" class="tab-pane fade">
                <?php echo $form->field($model, 'title_es')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'short_description_es')->textInput(['maxlength' => true]) ?>
                <?php echo $form->field($model, 'body_es')->textArea() ?>
                <?php echo $form->field($model, 'keywords_es')->hint('Please enter the keyword with commas')->textInput(['maxlength' => true]) ?>
                <section class="template-text" id="template_es" lang="es">

                </section>
            </div>
            <div id="menu7" class="tab-pane fade">
                <?php echo $form->field($model, 'title_ar')->textInput(['maxlength' => true,'dir'=>'rtl']) ?>
                <?php echo $form->field($model, 'short_description_ar')->textInput(['maxlength' => true,'dir'=>'rtl']) ?>
                <?php echo $form->field($model, 'body_ar')->textArea(['dir'=>'rtl']) ?>
                <?php echo $form->field($model, 'keywords_ar')->hint('Please enter the keyword with commas')->textInput(['maxlength' => true,'dir'=>'rtl']) ?>
                <section class="template-text" id="template_ar" lang="ar">

                </section>
            </div>
            <div id="menu8" class="tab-pane fade">
                <?php echo $form->field($model, 'title_fa')->textInput(['maxlength' => true,'dir'=>'rtl']) ?>
                <?php echo $form->field($model, 'short_description_fa')->textInput(['maxlength' => true,'dir'=>'rtl']) ?>
                <?php echo $form->field($model, 'body_fa')->textArea(['dir'=>'rtl']) ?>
                <?php echo $form->field($model, 'keywords_fa')->hint('Please enter the keyword with commas')->textInput(['maxlength' => true,'dir'=>'rtl']) ?>
                <section class="template-text" id="template_fa" lang="fa">

                </section>
            </div>
        </div>
    </div>


    <div class="form-group">
        <?php echo Html::submitButton(
            $model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'),
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary','onclick' => 'updateForm()']) ?>
    </div>
    <div id="tmpButtons">
        <span class="btn" id="addTemplate1Id">Add tempalate</span>
        <span class="btn" id="addTemplate2Id">Add tempalate 2</span>
        <span class="btn" id="addTemplate3Id">Add tempalate 3</span>
        <span class="btn" id="addTemplate4Id">Add tempalate 4</span>
        <span class="btn" id="addTemplate5Id">Add tempalate 5</span>
    </div>
    <div class="clear"></div>

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
        debugger;
        var lang = $(".active.in  [id^='article-body_']")[0].id.toString().slice($(".active.in  [id^='article-body_']")[0].id.indexOf("_")+1, $(".active.in  [id^='article-body_']")[0].id.length);
        var id = <?= $model->id?>+'';
        if(!!id){
            $("#tmpButtons").hide();
        }
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

        var template2String = `<div class="template-2">
                                    <div class="container">
                                        <div class="row flex-align-center">
                                            <div class="col-md-5 col-sm-6 col-xs-12" contenteditable="true">
                                                <h2>Как доехать</h2>
                                                <p>Несмотря на то, что в Арцах граничит с тремя государствами- Республикой Армения, Азербайджанской Республикой и Исламской Республикой Иран - для туристов по-прежнему основным маршрутом в Арцах является маршрут через Армению. Путь в приблизительно в 350 км - главное шоссе, соединяющее Ереван со Степанакертом – проходит по северным регионам Армении, через города Ехегнадзор, Вайк, Горис, и довольно привлекателен. Главное шоссе находится в хорошем состоянии и работает круглый год. Продолжительность поездки, в зависимости от транспортных средств, длится в диапазоне от 4 до 6 часов.Каждый день, с 8:00 утра с часовым интервалом от центрального автовокзала в Ереване отправляютсяавтобусы и микроавтобусы, прибывающие в Степанакерт за 5-6 часов. Цена билета - 5000 драмов (около 10-12 долларов США).</p>
                                                <p>Также, отсюда, со станции, путешественники могут нанять четырехместные такси. Стоимость проезда до Степанакерта на такси составяляет около 18 долларов США на одного пассажира.Такси отправляются когда наберется необходимое количество пассажиров.Можно арендовать за $ 90 и отдельную машину. До Арцаха из Армении также можно доехать по автодороге Варденис-Мартакерт, которая также находится в хорошем состоянии и хорошо обслуживается.В Степанакерте построен международный аэропорт, оснащенный самым современным оборудованием и готовым принимать иностранных граждан.</p>
                                            </div>
                                            <div class="col-md-offset-1 col-md-6 col-sm-6 col-xs-12">
                                                <div class="img-block">
                                                    <img data-toggle="modal" data-target="#myModal" data-title="Feedback" src="http://storage.loc/source/1/tnjri.jpg" alt="Tnjri">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>`;

        var template3String = `<div class="template-3">
                                    <div class="container">
                                        <div class="title-block">
                                            <div class="item"></div>
                                            <div class="item">
                                                <h2>Lorem ipsum dolor sit amet</h2>
                                            </div>
                                            <div class="item">
                                                <div class="line"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="img-block">
                                                    <img data-toggle="modal" data-target="#myModal" data-title="Feedback" src="http://storage.loc/source/1/tnjri.jpg" alt="Tnjri">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 right-text">
                                                <div class="item" contenteditable="true">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent ultrices vulputate leo sed malesuada. Donec telltus massa, impe rdiet fermentum massa eu, varius elementum est. Sed blandit ipsum eros, quis vulputate purus malesuada elementum. Vestibulum lacinia nisi vel orci porta, ac dictum ligula aliquet. Aenean in est vulputate, semper leo vel, convallis dui. Aenean metus lectus, volutpat in arcu nec, accumsan molestie nulla. Nullam consectetur sagittis ante vel vestibulum. Semper leo vel, convallis dui. Aenean metus lectus, volutpat in arcu nec, accumsan molestie nulla. Nullam consectetur sagittis ante vel vestibulum. Accumsan molestie nulla. Nullam consectetur sagittis ante vel vestibulum. Semper leo vel, convallis dui. Aenean metus lectus, volutpat in arcu nec, accumsan molestie nulla. Nullam consectetur sagittis ante vel vestibulum.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>`;

        var template4String = `<div class="template-5">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h2>История</h2>
                                            </div>
                                            <div class="col-md-6 col-sm-12"  contenteditable="true">
                                                <p>Арцах расположенв холмистой местности на юго-востоке Малого Кавказа, на крайне-восточном отрезке Великого Айка.На западе его границы доходят до восточных берегов озера Севан, к юго-западу – до реки Агавно /Агарь/, на юге- до реки Ерасх / Аракс/, к востоку углубляются в Муганьскую степь, а с севера огражденыKарабахским хребтом. Археологические материалы, армянские и другие источники свидетельствуют о том, что человек в Арцахе перманентнопроживал в древние времена. Здесь вы можете найти руины и следы населенныхпунктов, замков, отдельных построек, различное оружие, ювелирные изделия, инструменты, обнаруженные под глубоким слоем земли. Особый интерес представляют материалы, обнаруженные в пещере Азохэпохи палеолита в Гадрутском районе, останки доисторического человека /неандертальца/. Сегодня археологи Англии и Испании, совместно с армянскими археологами проводят раскопки здесь и открывают новые следы жизни и деятельности древнего человека. Арцахские горы богаты памятниками, особенно резьбой по камню. Хронология их обширна и, начиная с 7-го тысячелетиядо н.э. достигает 1-го тысячелетия: Резьбой по камню особенно богат Карвачарский район и окрестности села Тагут Гадруского района.
                                                </p>
                                            </div>
                                            <div class="col-md-6 col-sm-12"  contenteditable="true">
                                                <p>В Бронзовом веке в Восточных Армянских провинциях строились циклопические крепости. В Кашатагском районе, на левом берегу реки Очанц, сохранилась одна из таких крепостей.В 3-1 тысячелетиидо н.э. на Армянском нагорьепоявились первые государственные образования, в числе которых особое место и роль отводилос Урарту или Ванскому или АраратскомуЦарству.В годы правления Аргишти 1-гоАрцах находился в составе государства Урарту, о чем свидетельствует летопись Аргишти 1-го, найденная в Котайке, в которой упоминается город Зар. Название города совпадает со средневековым арцахским меликством Цар и современным селом Цар Карвачарского района.Во времена следующих армянских царских династий -Ервандидов и Арташесидов –Арцах и Утик продолжали оставаться в составе объединенного царства.Греческие и римские историки предполагают, что восточные границы Армении проходили по реке Кура.НезавершенныеделаАрташеса 5-гопродолжил его внук Тигран II Великий, и все наиболее расширив границы государства, создал Армению от моря до моря. Обширное государство было вовлечено в эллинистическую культуру, одной из характеристик которой являлось градостроительство.Тигран Великий построил 4 города в исконной Армении и назвал своим именем -Тигранакерт. Один из этих городов был построен в Арцахе у подножия Ванкасара.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="img-100p">
                                        <div class="img-block">
                                            <img data-toggle="modal" data-target="#myModal" data-title="Feedback" src="http://storage.loc/source/1/Melikatun.jpg" alt="Gandzasar">
                                        </div>
                                    </div>
                                </div>`;
        var template5String = `<div class="template-5">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h2>История</h2>
                                            </div>
                                            <div class="col-md-6 col-sm-12" contenteditable="true">
                                                <p>Арцах расположенв холмистой местности на юго-востоке Малого Кавказа, на крайне-восточном отрезке Великого Айка.На западе его границы доходят до восточных берегов озера Севан, к юго-западу – до реки Агавно /Агарь/, на юге- до реки Ерасх / Аракс/, к востоку углубляются в Муганьскую степь, а с севера огражденыKарабахским хребтом. Археологические материалы, армянские и другие источники свидетельствуют о том, что человек в Арцахе перманентнопроживал в древние времена. Здесь вы можете найти руины и следы населенныхпунктов, замков, отдельных построек, различное оружие, ювелирные изделия, инструменты, обнаруженные под глубоким слоем земли. Особый интерес представляют материалы, обнаруженные в пещере Азохэпохи палеолита в Гадрутском районе, останки доисторического человека /неандертальца/. Сегодня археологи Англии и Испании, совместно с армянскими археологами проводят раскопки здесь и открывают новые следы жизни и деятельности древнего человека. Арцахские горы богаты памятниками, особенно резьбой по камню. Хронология их обширна и, начиная с 7-го тысячелетиядо н.э. достигает 1-го тысячелетия: Резьбой по камню особенно богат Карвачарский район и окрестности села Тагут Гадруского района.
                                                </p>
                                            </div>
                                            <div class="col-md-6 col-sm-12" contenteditable="true">
                                                <p>В Бронзовом веке в Восточных Армянских провинциях строились циклопические крепости. В Кашатагском районе, на левом берегу реки Очанц, сохранилась одна из таких крепостей.В 3-1 тысячелетиидо н.э. на Армянском нагорьепоявились первые государственные образования, в числе которых особое место и роль отводилос Урарту или Ванскому или АраратскомуЦарству.В годы правления Аргишти 1-гоАрцах находился в составе государства Урарту, о чем свидетельствует летопись Аргишти 1-го, найденная в Котайке, в которой упоминается город Зар. Название города совпадает со средневековым арцахским меликством Цар и современным селом Цар Карвачарского района.Во времена следующих армянских царских династий -Ервандидов и Арташесидов –Арцах и Утик продолжали оставаться в составе объединенного царства.Греческие и римские историки предполагают, что восточные границы Армении проходили по реке Кура.НезавершенныеделаАрташеса 5-гопродолжил его внук Тигран II Великий, и все наиболее расширив границы государства, создал Армению от моря до моря. Обширное государство было вовлечено в эллинистическую культуру, одной из характеристик которой являлось градостроительство.Тигран Великий построил 4 города в исконной Армении и назвал своим именем -Тигранакерт. Один из этих городов был построен в Арцахе у подножия Ванкасара.</p>
                                            </div>
                                        </div>
                                        <div class="img-100p">
                                            <div class="img-block">
                                                <img data-toggle="modal" data-target="#myModal" data-title="Feedback" src="http://storage.loc/source/1/air-fest.jpg" alt="Gandzasar">
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
                var deletes = parser.parseFromString("<a onclick='deleteElelement(this)' ><span class='glyphicon glyphicon-remove'></span></a>", 'text/html').body.firstChild;
                root.append(template1);
                root.append(deletes);

            });
            $("#addTemplate2Id").on('click', function (event) {
                var template2 = parser.parseFromString(template2String, 'text/html');
                list.push(template2);
                var deletes = parser.parseFromString("<a onclick='deleteElelement(this)' ><span class='glyphicon glyphicon-remove'></span></a>", 'text/html').body.firstChild;
                root.append(template2.body.firstChild);
                root.append(deletes);
            });
            $("#addTemplate3Id").on('click', function (event) {
                var template3 = parser.parseFromString(template3String, 'text/html');
                list.push(template3);
                var deletes = parser.parseFromString("<a onclick='deleteElelement(this)' ><span class='glyphicon glyphicon-remove'></span></a>", 'text/html').body.firstChild;
                root.append(template3.body.firstChild);
                root.append(deletes);
            });
            $("#addTemplate4Id").on('click', function (event) {
                var template4 = parser.parseFromString(template4String, 'text/html');
                list.push(template4);
                var deletes = parser.parseFromString("<a onclick='deleteElelement(this)' ><span class='glyphicon glyphicon-remove'></span></a>", 'text/html').body.firstChild;
                root.append(template4.body.firstChild);
                root.append(deletes);
            });
            $("#addTemplate5Id").on('click', function (event) {
                var template5 = parser.parseFromString(template5String, 'text/html');
                list.push(template5);
                var deletes = parser.parseFromString("<a onclick='deleteElelement(this)' ><span class='glyphicon glyphicon-remove'></span></a>", 'text/html').body.firstChild;
                root.append(template5.body.firstChild);
                root.append(deletes);
            });
        });
        function save() {
            imgElement.src = $(event.target.parentElement.parentElement).find('#src').val();
            imgElement.title = $(event.target.parentElement.parentElement).find('#title').val();
        }

        function updateForm(){
            $( "*[contenteditable*=true]" ).each(function (item, item2){
                $(item2).attr("contenteditable", false);
            });
            $("[id^='article-body_']").each(function( index ) {
                var ln = this.id.toString().slice(this.id.indexOf("_")+1, this.id.length);
                debugger;
                if(!!id){
                    $("#article-body_" + ln).html($("#template_" + ln).html());
                }else{
                    $("#article-body_" + ln).html($("#template_en").html());
                }
            });
        }

        function deleteElelement(el) {
            el.previousSibling.remove();
            el.remove();
        }
        $("[id^='article-body_']").each(function( index ) {
            var ln = this.id.toString().slice(this.id.indexOf("_")+1, this.id.length);
            debugger;
            if(!!id){
                $("#template_" + ln).html($("#article-body_" + ln).text())
                ;
            }
        });
//        root.append(parser.parseFromString($("#bodyId").text(), 'text/html').body);
        $( "*[contenteditable*=false]" ).each(function (item, item2){
            $(item2).attr("contenteditable", true);
        });

    </script>
    <?php ActiveForm::end(); ?>

</div>
