<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Estudiantes;
use backend\models\Facultad;
use backend\models\TipoAp;
use backend\models\Grupo;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use wbraganca\dynamicform\DynamicFormWidget;

/* @var $this yii\web\View */
/* @var $model backend\models\Matricula */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="matricula-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>

    <?= $form->field($model, 'semestre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'anioacad')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'codEstudiante')->widget(Select2::classname(), [
          'data' => ArrayHelper::map(Estudiantes::find()->all(),'codEstudiante','nomapes'),
          'language' => 'en',
          'options' => ['placeholder' => 'Selecciona estudiante'],
          'pluginOptions' => [
              'allowClear' => true
          ],
      ]); ?>

      <?= $form->field($model, 'idFacultad')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Facultad::find()->all(),'idFacultad','nombref'),
            'language' => 'en',
            'options' => ['placeholder' => 'Selecciona facultad'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); ?>

    <div class="row">

      <div class="panel panel-default">
          <div class="panel-heading"><h4><i class="glyphicon glyphicon-envelope"></i> Grupos</h4></div>
          <div class="panel-body">
               <?php DynamicFormWidget::begin([
                  'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                  'widgetBody' => '.container-items', // required: css class selector
                  'widgetItem' => '.item', // required: css class
                  'limit' => 10, // the maximum times, an element can be cloned (default 999)
                  'min' => 1, // 0 or 1 (default 1)
                  'insertButton' => '.add-item', // css class
                  'deleteButton' => '.remove-item', // css class
                  'model' => $modeldetallemat[0],
                  'formId' => 'dynamic-form',
                  'formFields' => [
                      'nota',
                      'idTipoa',
                      'idGrupo',
                  ],
              ]); ?>

              <div class="container-items"><!-- widgetContainer -->
              <?php foreach ($modeldetallemat as $i => $modeldetallemat): ?>
                  <div class="item panel panel-default"><!-- widgetBody -->
                      <div class="panel-heading">
                          <h3 class="panel-title pull-left"> Grupos</h3>
                          <div class="pull-right">
                              <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                              <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                          </div>
                          <div class="clearfix"></div>
                      </div>
                      <div class="panel-body">
                          <?php
                              // necessary for update action.
                              if (! $modeldetallemat->isNewRecord) {
                                  echo Html::activeHiddenInput($modeldetallemat, "[{$i}]id");
                              }
                          ?>
                          <div class="row">
                              <div class="col-sm-6">

                                <?= $form->field($modeldetallemat, "[{$i}]idGrupo")->dropDownList(
                                  ArrayHelper::map(Grupo::find()->all(),'idGrupo','idAsignatura'),
                                  ['prompt'=>'Selecciona grupo']
                                )?>

                                <?= $form->field($modeldetallemat, "[{$i}]idTipoa")->dropDownList(
                                  ArrayHelper::map(TipoAp::find()->all(),'idTipoa','descripcion'),
                                  ['prompt'=>'Tipo de aprobación']
                                )?>

                                <?= $form->field($modeldetallemat, "[{$i}]nota")->textInput(['maxlength' => true]) ?>

                              </div>
                          </div>
                      </div>
                  </div>
              <?php endforeach; ?>
              </div>
              <?php DynamicFormWidget::end(); ?>
          </div>

    </div>


    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
