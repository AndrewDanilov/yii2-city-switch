<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model \andrewdanilov\cityswitch\models\CitySwitch */
/* @var $dataParams array */
?>

<div class="city-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'city_name')->textInput(['maxlength' => true]) ?>

	<?php foreach ($dataParams as $param => $paramName) { ?>
        <?= $form->field($model, '[cityData]' . $param)->textInput(['maxlength' => true])->label($paramName) ?>
	<?php } ?>

	<?= $form->field($model, 'order')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
