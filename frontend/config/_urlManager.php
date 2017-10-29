<?php
return [
    'class' => 'codemix\localeurls\UrlManager',
    'enablePrettyUrl'=>true,
    'showScriptName'=>false,
    'languages' => ['hy', 'en', 'ru', 'de','fr', 'es', 'ar', 'ir'],
    'rules'=> [

        //Site
        ['pattern'=>'site/', 'route'=>'site/index'],
        ['pattern'=>'site/contact', 'route'=>'site/contact'],
        ['pattern'=>'site/set-locale', 'route'=>'site/set-locale'],
        ['pattern'=>'site/captcha', 'route'=>'site/captcha'],
        ['pattern'=>'site/error', 'route'=>'site/error'],
        // Pages
        ['pattern'=>'page/<slug>', 'route'=>'page/view'],
        //Events
        ['pattern'=>'event', 'route'=>'event/index'],
        ['pattern'=>'event/<slug>', 'route'=>'event/view'],
        // Articles
        ['pattern'=>'<category>/<slug>', 'route'=>'article/category-routing'],
        ['pattern'=>'<category>', 'route'=>'article/category-routing'],
        ['pattern'=>'article/attachment-download', 'route'=>'article/attachment-download'],
//
//        ['pattern'=>'article/<slug>', 'route'=>'article/view'],

        // Api
        ['class' => 'yii\rest\UrlRule', 'controller' => 'api/v1/article', 'only' => ['index', 'view', 'options']],
        ['class' => 'yii\rest\UrlRule', 'controller' => 'api/v1/user', 'only' => ['index', 'view', 'options']]
    ]
];
