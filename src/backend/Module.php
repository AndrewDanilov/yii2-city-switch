<?php
namespace andrewdanilov\cityswitch\backend;

use yii\filters\AccessControl;

class Module extends \yii\base\Module
{
	public $controllerNamespace = 'andrewdanilov\cityswitch\backend\controllers';
	public $dataParams = [];
	public $access = ['*'];

	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::class,
				'rules' => [
					[
						'allow' => true,
						'roles' => $this->access,
					]
				],
			],
		];
	}
}