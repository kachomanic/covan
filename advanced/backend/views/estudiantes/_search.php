<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\EstudiantesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estudiantes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'codEstudiante') ?>

    <?= $form->field($model, 'carnetEst') ?>

    <?= $form->field($model, 'fechaIngreso') ?>

    <?= $form->field($model, 'teleDomicilio') ?>

    <?= $form->field($model, 'direccionDomicilio') ?>

    <?php // echo $form->field($model, 'cedula') ?>

    <?php // echo $form->field($model, 'fechaNac') ?>

    <?php // echo $form->field($model, 'lugarNac') ?>

    <?php // echo $form->field($model, 'nomapes') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
