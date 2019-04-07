<?php
namespace andrewdanilov\cityswitch;

use andrewdanilov\cityswitch\models\CitySwitch;

class CitySwitchHelper
{
	// принудительная изначальная установка города по ссылке вида http://www.example.com/?city=krd
	// срабатывает только один раз, затем город считается выбранным и сменить его можно только через меню
	public static function changeCity() {
		$cities = CitySwitch::getCities();
		if (!isset($_COOKIE['currentCityCode']) && isset($_GET['city']) && array_key_exists($_GET['city'], $cities)) {
			$_COOKIE['currentCityCode'] = $_GET['city'];
			setcookie('currentCityCode', $_GET['city'], time() + (86400 * 30), "/");
		}
	}
}