<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;
use backend\models\Asignatura;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Prerrequisito */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="prerrequisito-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>

    <?= $form->field($model, 'idAsignatura')->widget(Select2::classname(), [
          'data' => ArrayHelper::map(Asignatura::find()->all(),'idAsignatura','nombrea'),
          'language' => 'en',
          'options' => ['placeholder' => ''],
          'pluginOptions' => [
              'allowClear' => true
          ],
      ]); ?>

    <div class="row">
      <div class="panel panel-default">
         <div class="panel-heading"><h4><i class="glyphicon glyphicon-envelope"></i> Prerrequisitos</h4></div>
         <div class="panel-body">
              <?php DynamicFormWidget::begin([
                 'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                 'widgetBody' => '.container-items', // required: css class selector
                 'widgetItem' => '.item', // required: css class
                 'limit' => 1, // the maximum times, an element can be cloned (default 999)
                 'min' => 1, // 0 or 1 (default 1)
                 'insertButton' => '.add-item', // css class
                 'deleteButton' => '.remove-item', // css class
                 'model' => $modelsdetallepre[0],
                 'formId' => 'dynamic-form',
                 'formFields' => [
                     'idAsignatura',
                 ],
             ]); ?>

             <div class="container-items"><!-- widgetContainer -->
             <?php foreach ($modelsdetallepre as $i => $modelsdetallepre): ?>
                 <div class="item panel panel-default"><!-- widgetBody -->
                     <div class="panel-heading">
                         <h3 class="panel-title pull-left">Prerrequisito</h3>
                         <div class="pull-right">
                             <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                             <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                         </div>
                         <div class="clearfix"></div>
                     </div>
                     <div class="panel-body">
                         <?php
                             // necessary for update action.
                             if (! $modelsdetallepre->isNewRecord) {
                                 echo Html::activeHiddenInput($modelsdetallepre, "[{$i}]id");
                             }
                         ?>
                         <div class="row">

                             <div class="col-sm-6">
                                       <?=
                                       $form->field($modelsdetallepre, "[{$i}]idAsignatura")->widget(Select2::classname(), [
                                       'data' => ArrayHelper::map(Asignatura::find()->all(),'idAsignatura','nombrea'),
                                       'language' => 'en',
                                       'options' => ['placeholder' => 'Selecciona asignatura'],
                                       'pluginOptions' => [
                                           'allowClear' => true
                                       ],])
                                       ?>


                             </div>
                         </div><!-- .row -->

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
