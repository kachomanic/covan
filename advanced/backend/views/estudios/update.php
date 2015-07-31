<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Estudios */

$this->title = 'Actualizar Estudios: ' . ' ' . $model->idEstudios;
$this->params['breadcrumbs'][] = ['label' => 'Estudios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idEstudios, 'url' => ['view', 'id' => $model->idEstudios]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="estudios-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
