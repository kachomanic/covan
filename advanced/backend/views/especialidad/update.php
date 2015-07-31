<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Especialidad */

$this->title = 'Update Especialidad: ' . ' ' . $model->idEspecialidad;
$this->params['breadcrumbs'][] = ['label' => 'Especialidads', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idEspecialidad, 'url' => ['view', 'id' => $model->idEspecialidad]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="especialidad-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
