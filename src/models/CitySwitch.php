<?php
namespace andrewdanilov\cityswitch\models;

/**
 * @property $cityData array
 * @property int $id
 * @property string $city
 * @property string $city_name
 * @property string $data
 * @property int $order
 */
class CitySwitch extends \yii\db\ActiveRecord
{
	public static function tableName()
	{
		return 'cityswitch';
	}

	public function rules()
	{
		return [
			['city', 'required'],
			['city', 'city_name', 'string', 'max' => 255],
			['city', 'unique'],
			['data', 'safe'],
			['order', 'integer'],
			['order', 'default', 'value' => 0],
		];
	}

	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'city' => 'Город',
			'city_name' => 'Название города',
			'data' => 'Данные',
			'order' => 'Порядок',
		];
	}

	/**
	 * Returns current city if it choosed,
	 * default city otherwise
	 *
	 * @return CitySwitch|bool
	 */
	public static function getCurrentCity()
	{
		if (isset($_COOKIE['currentCityCode'])) {
			$city = static::find()->where(['city' => $_COOKIE['currentCityCode']])->one();
			if ($city) {
				return $city;
			}
		}
		return static::getDefaultCity();
	}

	/**
	 * Returns default city (first by order)
	 *
	 * @return CitySwitch|bool
	 */
	public static function getDefaultCity()
	{
		$city = static::find()->orderBy('`order`')->limit(1)->one();
		if ($city) {
			return $city;
		}
		return false;
	}

	/**
	 * Returns all cities ordered by `order`
	 *
	 * @return CitySwitch[]
	 */
	public static function getCities()
	{
		return CitySwitch::find()->orderBy('`order`')->all();
	}

	/**
	 * @return array|null
	 */
	public function getCityData()
	{
		if ($this->data) {
			return json_decode($this->data, true);
		}
		return [];
	}

	/**
	 * @param array $data
	 */
	public function setCityData($data)
	{
		$this->data = json_encode($data);
	}
}