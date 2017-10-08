<?php
return [
    'class' => 'codemix\localeurls\UrlManager',
    'enablePrettyUrl'=>true,
    'showScriptName'=>false,
    'languages' => ['hy', 'en', 'ru', 'de','fr', 'es', 'ar', 'ir'],
    'rules'=> [
        // Pages
        ['pattern'=>'<slug>', 'route'=>'page/view'],

        // Articles
        ['pattern'=>'article/index', 'route'=>'article/index'],
        ['pattern'=>'article/attachment-download', 'route'=>'article/attachment-download'],
        ['pattern'=>'article/<slug>', 'route'=>'article/view'],

        // Api
        ['class' => 'yii\rest\UrlRule', 'controller' => 'api/v1/article', 'only' => ['index', 'view', 'options']],
        ['class' => 'yii\rest\UrlRule', 'controller' => 'api/v1/user', 'only' => ['index', 'view', 'options']]
    ]
];
