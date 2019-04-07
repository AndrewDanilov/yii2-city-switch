<?php

/* @var $this yii\web\View */
/* @var $model \andrewdanilov\cityswitch\models\CitySwitch */
/* @var $dataParams array */

$this->title = 'Изменить город: ' . $model->city_name;
$this->params['breadcrumbs'][] = ['label' => 'Города', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->city_name;
?>
<div class="city-update">

    <?= $this->render('_form', [
        'model' => $model,
	    'dataParams' => $dataParams,
    ]) ?>

</div>
