<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use backend\models\Plan;
use backend\models\Facultad;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Carrera */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="carrera-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombreca')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'idPlan')->widget(Select2::classname(), [
          'data' => ArrayHelper::map(plan::find()->all(),'idPlan','nombrep'),
          'language' => 'en',
          'options' => ['placeholder' => ''],
          'pluginOptions' => [
              'allowClear' => true
          ],
      ]); ?>

      <?= $form->field($model, 'idFacultad')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Facultad::find()->all(),'idFacultad','nombref'),
            'language' => 'en',
            'options' => ['placeholder' => ''],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Guardar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
