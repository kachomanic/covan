<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use dosamigos\datetimepicker\DateTimePicker;
use kartik\select2\Select2;
use backend\models\Especialidad;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Docentes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="docentes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'carnetDocente')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombres')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cedula')->widget(\yii\widgets\MaskedInput::classname(),['mask'=>'999-999999-9999A',]) ?>

    <?= $form->field($model, 'telefono')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'celular')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'correo')->textInput(['maxlength' => 50,'placeholder'=>'micorreo@empresa.com' ]) ?>

    <?= $form->field($model, 'idEspecialidad')->widget(Select2::classname(), [
          'data' => ArrayHelper::map(Especialidad::find()->all(),'idEspecialidad','nombree'),
          'language' => 'en',
          'options' => ['placeholder' => ''],
          'pluginOptions' => [
              'allowClear' => true
          ],
      ]); ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Guardar' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
