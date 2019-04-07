<?php
namespace andrewdanilov\cityswitch;

use yii\base\Widget;
use andrewdanilov\cityswitch\models\CitySwitch;

class CitySwitchValue extends Widget
{
	public $param = 'city_name';

	public function run()
	{
		if (!$this->param) {
			return '';
		}
		$city = CitySwitch::getCurrentCity();
		if (isset($city->{$this->param})) {
			return $city->{$this->param};
		}
		$data = $city->getCityData();
		if (isset($data[$this->param])) {
			return $data[$this->param];
		}
		return '';
	}
}