<?php
namespace andrewdanilov\cityswitch\backend;

use yii\base\BootstrapInterface;
use yii\web\Application;

class Bootstrap implements BootstrapInterface
{
	public $dataParams = [];
	public $access = ['*'];

	/**
	 * @inheritdoc
	 */
	public function bootstrap($app)
	{
		/* @var $app Application */
		$app->getUrlManager()->addRules([
			'admin/cityswitch' => 'admin/city-switch/index',
			'admin/cityswitch/<action>' => 'admin/city-switch/<action>',
		], false);

		$app->setModule('cityswitch', [
			'class' => 'andrewdanilov\cityswitch\backend\Module',
			'dataParams' => $this->dataParams,
			'access' => $this->access,
		]);
	}
}