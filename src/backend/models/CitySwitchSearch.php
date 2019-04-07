<?php
namespace andrewdanilov\cityswitch\backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use andrewdanilov\cityswitch\models\CitySwitch;

class CitySwitchSearch extends CitySwitch
{
	/**
	 * {@inheritdoc}
	 */
	public function rules()
	{
		return [
			[['id'], 'integer'],
			[['city', 'city_name', 'order'], 'safe'],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function scenarios()
	{
		// bypass scenarios() implementation in the parent class
		return Model::scenarios();
	}

	/**
	 * Creates data provider instance with search query applied
	 *
	 * @param array $params
	 *
	 * @return ActiveDataProvider
	 */
	public function search($params)
	{
		$query = CitySwitch::find();

		// add conditions that should always apply here

		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		$this->load($params);

		if (!$this->validate()) {
			// uncomment the following line if you do not want to return any records when validation fails
			// $query->where('0=1');
			return $dataProvider;
		}

		// grid filtering conditions
		$query->andFilterWhere([
			'id' => $this->id,
			'order' => $this->order,
		]);

		$query->andFilterWhere(['like', 'city', $this->city])
			->andFilterWhere(['like', 'city_name', $this->city_name]);

		return $dataProvider;
	}
}
