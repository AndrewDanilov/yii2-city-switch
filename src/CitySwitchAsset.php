<?php
namespace andrewdanilov\cityswitch;

use yii\web\AssetBundle;

class CitySwitchAsset extends AssetBundle
{
	public $sourcePath = '@andrewdanilov/CitySwitch/web';
	public $css = [
		'css/city-switch.css',
	];
	public $js = [
		'js/city-switch.js',
	];
	public $depends = [
		'yii\web\JqueryAsset',
	];
}