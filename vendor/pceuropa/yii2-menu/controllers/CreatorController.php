<?php namespace pceuropa\menu\controllers;
#Copyright (c) 2016-2017 Rafal Marguzewicz pceuropa.net LTD
use Yii;
use yii\web\Response;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;

use pceuropa\menu\models\Model;
use pceuropa\menu\models\Search;

class CreatorController extends \yii\web\Controller {

	public function beforeAction($action) {
		$this->enableCsrfValidation = false;
		return parent::beforeAction($action);
	}

	public function actionIndex(){

		$searchModel = new Search();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		return $this->render('index', [
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
		]);
	}

	public function actionCreate(){
		$m = new Model();

        if ( $m->load(Yii::$app->request->post())){
        
        	$m->scenario = 'insert';
        	$m->save();
            return $this->redirect(['update', 'id' => $m->menu_id]);
        }
        return $this->render('create', ['model' => $m]);
	}

	public function actionView($id){
		$m = Model::findModel($id);
		$r = Yii::$app->request;
	
		 if ($r->isAjax) {
			\Yii::$app->response->format = Response::FORMAT_JSON;

			switch (true) {
				case $r->post('get'): 
					return ['success' => true, 'menu' => $m->menu];
				default: 
					return ['success' => false];
			}
		}

		return $this->render('view', ['model' => $m]);
	}

	public function actionUpdate($id){
		$m = $this->findModel($id);
		$r = Yii::$app->request;
	
		 if ($r->isAjax) {
			\Yii::$app->response->format = Response::FORMAT_JSON;

			switch (true) {
				case $r->isGet: 
					return ['success' => true, 'menu' => $m->menu];
				case $r->post('update'): 
					$m->menu = $r->post('menu');
					return  ['success' => $m->save()]; 
					
				default: return ['success' => false];
			}
		}
	
		return $this->render('update');
	}

	public function actionDelete($id){
		$this->findModel($id)->delete();
		return $this->redirect(Yii::$app->request->referrer);
	}
    
    protected function findModel($id){
	    if (($model = Model::findOne($id)) !== null) {
		    return $model;
	    } else {
		    throw new NotFoundHttpException('The requested menu does not exist.');
	    }
    }




}
