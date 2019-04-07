<?php
namespace andrewdanilov\cityswitch;

use yii\base\Widget;
use andrewdanilov\cityswitch\models\CitySwitch;

class CitySwitchMenu extends Widget
{
	public $templateItem = '@andrewdanilov/cityswitch/views/menu/item';
	public $templateWrapper = '@andrewdanilov/cityswitch/views/menu/wrapper';

	public function run()
	{
		CitySwitchAsset::register($this->getView());

		$cities = CitySwitch::getCities();
		$currentCity = CitySwitch::getCurrentCity();
		$out = [];
		foreach ($cities as $city) {
			if ($city->city !== $currentCity->city) {
				$out[] = $this->render($this->templateItem, ['cityCode' => $city->city, 'cityName' => $city->city_name]);
			}
		}
		return $this->render($this->templateWrapper, ['currentCityName' => $currentCity->city_name, 'content' => implode('', $out)]);
	}
}