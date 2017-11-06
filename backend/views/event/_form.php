
<?php
use trntv\filekit\widget\Upload;
use trntv\yii\datetime\DateTimeWidget;
use pudinglabs\tagsinput\TagsinputWidget;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\web\View;


/* @var $this yii\web\View */
/* @var $model common\models\Event */
/* @var $categories common\models\ArticleCategory[] */
/* @var $form yii\bootstrap\ActiveForm */

$this->registerJsFile(
    'https://maps.googleapis.com/maps/api/js?key=AIzaSyAEHv8JbWzo_67F0eZxQ5niDBpTKqfN7Ec&callback=init'
);
$this->registerJs(
    "
    function init() {
        debugger;
        // Basic options for a simple Google Map
        // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
        var mapOptions = {
            // How zoomed in you want the map to start at (always required)
            zoom: 16,

            // The latitude and longitude to center the map (always required)
            center: new google.maps.LatLng(39.8152777778 , 46.7519444444), // New York

            // How you would like to style the map.
            // This is where you would paste any style found on Snazzy Maps.
            styles: [{\"featureType\":\"water\",\"elementType\":\"geometry\",\"stylers\":[{\"color\":\"#e9e9e9\"},{\"lightness\":17}]},{\"featureType\":\"landscape\",\"elementType\":\"geometry\",\"stylers\":[{\"color\":\"#f5f5f5\"},{\"lightness\":20}]},{\"featureType\":\"road.highway\",\"elementType\":\"geometry.fill\",\"stylers\":[{\"color\":\"#ffffff\"},{\"lightness\":17}]},{\"featureType\":\"road.highway\",\"elementType\":\"geometry.stroke\",\"stylers\":[{\"color\":\"#ffffff\"},{\"lightness\":29},{\"weight\":0.2}]},{\"featureType\":\"road.arterial\",\"elementType\":\"geometry\",\"stylers\":[{\"color\":\"#ffffff\"},{\"lightness\":18}]},{\"featureType\":\"road.local\",\"elementType\":\"geometry\",\"stylers\":[{\"color\":\"#ffffff\"},{\"lightness\":16}]},{\"featureType\":\"poi\",\"elementType\":\"geometry\",\"stylers\":[{\"color\":\"#f5f5f5\"},{\"lightness\":21}]},{\"featureType\":\"poi.park\",\"elementType\":\"geometry\",\"stylers\":[{\"color\":\"#dedede\"},{\"lightness\":21}]},{\"elementType\":\"labels.text.stroke\",\"stylers\":[{\"visibility\":\"on\"},{\"color\":\"#ffffff\"},{\"lightness\":16}]},{\"elementType\":\"labels.text.fill\",\"stylers\":[{\"saturation\":36},{\"color\":\"#333333\"},{\"lightness\":40}]},{\"elementType\":\"labels.icon\",\"stylers\":[{\"visibility\":\"off\"}]},{\"featureType\":\"transit\",\"elementType\":\"geometry\",\"stylers\":[{\"color\":\"#f2f2f2\"},{\"lightness\":19}]},{\"featureType\":\"administrative\",\"elementType\":\"geometry.fill\",\"stylers\":[{\"color\":\"#fefefe\"},{\"lightness\":20}]},{\"featureType\":\"administrative\",\"elementType\":\"geometry.stroke\",\"stylers\":[{\"color\":\"#fefefe\"},{\"lightness\":17},{\"weight\":1.2}]}]
        };

        // Get the HTML DOM element that will contain your map
        // We are using a div with id=\"map\" seen below in the <body>
        var mapElement = document.getElementById('map');

        // Create the Google Map using our element and options defined above
        var map = new google.maps.Map(mapElement, mapOptions);

        // Let's also add a marker while we're at it
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(39.8152777778, 46.7519444444),
            map: map,
            title: 'Artsakh.travel'
        });
    }",
    View::POS_BEGIN
);
?>

<div class="article-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'slug')
        ->hint(Yii::t('backend', 'If you\'ll leave this field empty, slug will be generated automatically'))
        ->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'ticket_price')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'latitude')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'longitude')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'video_link')->textInput(['maxlength' => true]) ?>

    <?=
    $form->field($model, 'tags')->widget(TagsinputWidget::classname(), [
        'options' => [],
        'clientOptions' => [],
        'clientEvents' => []
    ]);
    ?>

    <?php echo $form->field($model, 'category_id')->dropDownList(\yii\helpers\ArrayHelper::map(
            $categories,
            'id',
            'title_en'
        ), ['prompt'=>'']) ?>

    <div class="col-md-5 col-sm-6 com-xs-12">
        <div id="map">
        </div>
    </div>

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

    <div class="form-group">
        <?php echo Html::submitButton(
            $model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'),
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
