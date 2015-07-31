<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Asignatura */

$this->title = 'Update Asignatura: ' . ' ' . $model->idAsignatura;
$this->params['breadcrumbs'][] = ['label' => 'Asignaturas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idAsignatura, 'url' => ['view', 'id' => $model->idAsignatura]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="asignatura-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
