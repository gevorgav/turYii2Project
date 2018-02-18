<?php
namespace frontend\controllers;

use Yii;
use frontend\models\ContactForm;
use yii\helpers\Html;
use yii\web\Controller;
use common\models\Article;
use common\models\ArticleCategory;
use yii\data\ActiveDataProvider;
use common\models\HomePageConfigs;
use common\models\Slider;
use common\models\News;

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
            'set-locale' => [
                'class' => 'common\actions\SetLocaleAction',
                'locales' => array_keys(Yii::$app->params['availableLocales'])
            ]
        ];
    }

    public function actionIndex()
    {
        //Article Regions
        $categoryModelPYT = ArticleCategory::find()->andWhere(['slug' => 'plan-your-trip'])->one();
        $query = Article::find()->where(['category_id' => $categoryModelPYT->id]);
        $providerPYT = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'defaultOrder' => ['created_at' => SORT_ASC]
            ],
        ]);
        //Slider
        $sliders = Slider::find()->all();

        //Home page configs
        $configs = HomePageConfigs::find()->one();

        //Find Latest news by config
        $news = News::find()->where(['slug' => $configs->latest_news_slug])->one();
        if (!$news){
            $configs->show_latest_news = 0;
        }

        return $this->render('index', [
            'sliders' => $sliders,
            'dataProviderPYT' => $providerPYT,
            'categoryPYT' => $categoryModelPYT,
            'configs' => $configs,
            'news' => $news]);
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->contact(Yii::$app->params['adminEmail'])) {
                Yii::$app->getSession()->setFlash('alert', [
                    'body' => Yii::t('frontend', 'Thank you for contacting us. We will respond to you as soon as possible.'),
                    'options' => ['class' => 'alert-success']
                ]);
                return $this->refresh();
            } else {
                Yii::$app->getSession()->setFlash('alert', [
                    'body' => \Yii::t('frontend', 'There was an error sending email.'),
                    'options' => ['class' => 'alert-danger']
                ]);
            }
        }

        return $this->render('contact', [
            'model' => $model
        ]);
    }

    public function actionSubscription()
    {
        $model = new \common\models\Subscription();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $email = Html::encode($model->email);
            $model->email = $email;
            $model->addtime = (string)time();
            if ($model->save()) {
                Yii::$app->response->refresh();
                echo "<p style='color:green'>" . Yii::t('frontend', 'Subscribed!') . "</p>";
                exit;
            }
        } else {
            if ($model->errors['email'][0]) {
                echo "<p style='color:red'>" . $model->errors['email'][0] . "!</p>";
            }
        }
        exit;
    }
}
