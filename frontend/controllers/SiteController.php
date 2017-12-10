<?php
namespace frontend\controllers;

use Yii;
use frontend\models\ContactForm;
use yii\web\Controller;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction'
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null
            ],
            'set-locale'=>[
                'class'=>'common\actions\SetLocaleAction',
                'locales'=>array_keys(Yii::$app->params['availableLocales'])
            ]
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->contact(Yii::$app->params['adminEmail'])) {
                Yii::$app->getSession()->setFlash('alert', [
                    'body'=>Yii::t('frontend', 'Thank you for contacting us. We will respond to you as soon as possible.'),
                    'options'=>['class'=>'alert-success']
                ]);
                return $this->refresh();
            } else {
                Yii::$app->getSession()->setFlash('alert', [
                    'body'=>\Yii::t('frontend', 'There was an error sending email.'),
                    'options'=>['class'=>'alert-danger']
                ]);
            }
        }

        return $this->render('contact', [
            'model' => $model
        ]);
    }

    public function actionSubscription(){
        $model = new \common\models\Subscription();
        if ($model->load(Yii::$app->request->post()) && $model->validate()){
            $email = Html::encode($model->email);
            $model->email = $email;
            $model->addtime = (string) time();
            if ($model->save()) {
                Yii::$app->response->refresh(); //очистка данных из формы
                echo "<p style='color:green'>Подписка оформлена!</p>";
                exit;
            }
        } else {
            echo "<p style='color:red'>Ошибка оформления подписки.</p>";
            //Проверяем наличие фразы в массиве ошибки
            if(strpos($model->errors['email'][0], 'уже занято') !== false) {
                echo "<p style='color:red'>Вы уже подписаны!</p>";
            }
        }
        exit;
    }
}
