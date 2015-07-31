<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use backend\models\Estudiantes;
use dosamigos\datepicker\DatePicker;
use dosamigos\datetimepicker\DateTimePicker;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\Estudios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estudios-form">

  <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>



  <?= $form->field($model, 'codEstudiante')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Estudiantes::find()->all(),'codEstudiante','nomapes'),
        'language' => 'en',
        'options' => ['placeholder' => ''],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'titulo')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'lugar')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'file') ->fileInput(); ?>

    <?= $form->field($model, 'fecha')->widget(DatePicker::className(),[
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


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Guardar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
