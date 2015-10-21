<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Detallemat */

$this->title = 'Update Detallemat: ' . ' ' . $model->iddetalle;
$this->params['breadcrumbs'][] = ['label' => 'Detallemats', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->iddetalle, 'url' => ['view', 'id' => $model->iddetalle]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="detallemat-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
