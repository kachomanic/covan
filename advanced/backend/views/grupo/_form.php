<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use backend\models\Docentes;
use backend\models\Asignatura;
use backend\models\Plan;


/* @var $this yii\web\View */
/* @var $model backend\models\Grupo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="grupo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idDocente')->widget(Select2::classname(), [
          'data' => ArrayHelper::map(Docentes::find()->all(),'idDocente','nombres'),
          'language' => 'en',
          'options' => ['placeholder' => ''],
          'pluginOptions' => [
              'allowClear' => true
          ],
      ]); ?>

      <?= $form->field($model, 'idAsignatura')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Asignatura::find()->all(),'idAsignatura','nombrea'),
            'language' => 'en',
            'options' => ['placeholder' => ''],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); ?>

        <?= $form->field($model, 'idPlan')->widget(Select2::classname(), [
              'data' => ArrayHelper::map(Plan::find()->all(),'idPlan','nombrep'),
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
