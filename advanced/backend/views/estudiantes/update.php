<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Estudiantes */

$this->title = 'Update Estudiantes: ' . ' ' . $model->codEstudiante;
$this->params['breadcrumbs'][] = ['label' => 'Estudiantes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->codEstudiante, 'url' => ['view', 'id' => $model->codEstudiante]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="estudiantes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
