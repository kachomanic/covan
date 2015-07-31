<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Facultad */

$this->title = 'Actualizar Facultad: ' . ' ' . $model->idFacultad;
$this->params['breadcrumbs'][] = ['label' => 'Facultads', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idFacultad, 'url' => ['view', 'id' => $model->idFacultad]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="facultad-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
