<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Detallemat */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detallemat-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nota')->textInput() ?>

    <?= $form->field($model, 'idTipoa')->textInput() ?>

    <?= $form->field($model, 'idGrupo')->textInput() ?>

    <?= $form->field($model, 'idMatricula')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
