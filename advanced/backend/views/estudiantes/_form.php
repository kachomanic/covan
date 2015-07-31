<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use dosamigos\datetimepicker\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\Estudiantes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estudiantes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'carnetEst')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cedula')->widget(\yii\widgets\MaskedInput::classname(),['mask'=>'999-999999-9999A',]) ?>

    <?= $form->field($model, 'nomapes')->textInput(['maxlength' => 70]) ?>

    <?= $form->field($model, 'fechaIngreso')->widget(DatePicker::className(),[
                'attribute'=>'date',//date('Y-m-d'),
                'template' => '{addon}{input}',
                'language' => 'es',
                //'inline'=>true,
                'clientOptions' => [
                  'startView' => 2,
                  'minView' => 0,
                  'maxView' => 1,
                  'autoclose' => true,
                  //'edit'=>false,
                  //'todayBtn' => true,
                  'format' => 'yyyy-mm-dd',
                  //'viewformat' => 'dd/mm/yyyy',
                  ]])?>


    <?= $form->field($model, 'teleDomicilio')->textInput(['maxlength' => 12]) ?>

    <?= $form->field($model, 'direccionDomicilio')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'fechaNac')->widget(DatePicker::className(),[
                'attribute'=>'date',//date('Y-m-d'),
                'template' => '{addon}{input}',
                'language' => 'es',
                //'inline'=>true,
                'clientOptions' => [
                  'startView' => 2,
                  'minView' => 0,
                  'maxView' => 1,
                  'autoclose' => true,
                  //'edit'=>false,
                  //'todayBtn' => true,
                  'format' => 'yyyy-mm-dd',
                  //'viewformat' => 'dd/mm/yyyy',
                  ]])?>


    <?= $form->field($model, 'lugarNac')->textInput(['maxlength' => 25]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Guardar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
