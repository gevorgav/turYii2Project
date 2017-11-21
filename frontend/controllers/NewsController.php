<?php
/**
 * Created by PhpStorm.
 * User: Home
 * Date: 20.11.2017
 * Time: 20:46
 */

# var mo
namespace frontend\controllers;


use common\models\News;
use frontend\models\search\NewsSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class NewsController extends Controller
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new NewsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->sort = [
            'defaultOrder' => ['published_at' => SORT_ASC]
        ];
        return $this->render('index', ['dataProvider' => $dataProvider]);
    }

    /**
     * @param $slug
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionView($slug)
    {
        $model = News::find()->published()->andWhere(['slug' => $slug])->one();
        $nextModel = News::find()->published()->andWhere(['>', '{{%news}}.published_at', $model->published_at] )->orderBy('{{%news}}.published_at')->one();
        if (!$model) {
            throw new NotFoundHttpException;
        }

        $viewFile = $model->view ?: 'view';
        return $this->render($viewFile, ['model' => $model, 'nextModel' => $nextModel]);
    }
}