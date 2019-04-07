<?php

/* @var $this yii\web\View */
/* @var $model \andrewdanilov\cityswitch\models\CitySwitch */
/* @var $dataParams array */

$this->title = 'Добавить город';
$this->params['breadcrumbs'][] = ['label' => 'Города', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="city-create">

    <?= $this->render('_form', [
        'model' => $model,
        'dataParams' => $dataParams,
    ]) ?>

</div>
