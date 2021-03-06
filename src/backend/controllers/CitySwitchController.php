<?php
namespace andrewdanilov\cityswitch\backend\controllers;

use andrewdanilov\cityswitch\backend\Module;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use andrewdanilov\cityswitch\models\CitySwitch;
use andrewdanilov\cityswitch\backend\models\CitySwitchSearch;

class CitySwitchController extends Controller
{
	/**
	 * Lists all CitySwitch models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$searchModel = new CitySwitchSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		return $this->render('index', [
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
		]);
	}

	/**
	 * Creates a new CitySwitch model.
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model = new CitySwitch();

		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			return $this->redirect(['index']);
		}

		/* @var $module Module */
		$module = Yii::$app->controller->module;

		return $this->render('create', [
			'model' => $model,
			'dataParams' => $module->dataParams,
		]);
	}

	/**
	 * Updates an existing CitySwitch model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id
	 * @return mixed
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	public function actionUpdate($id)
	{
		$model = $this->findModel($id);

		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			return $this->redirect(['index']);
		}

		/* @var $module Module */
		$module = Yii::$app->controller->module;

		return $this->render('update', [
			'model' => $model,
			'dataParams' => $module->dataParams,
		]);
	}

	/**
	 * Deletes an existing CitySwitch model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id
	 * @return mixed
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	public function actionDelete($id)
	{
		$this->findModel($id)->delete();

		return $this->redirect(['index']);
	}

	/**
	 * Finds the City model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return CitySwitch the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if (($model = CitySwitch::findOne($id)) !== null) {
			return $model;
		}

		throw new NotFoundHttpException('The requested page does not exist.');
	}
}