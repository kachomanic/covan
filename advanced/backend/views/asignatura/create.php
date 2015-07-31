<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Asignatura */

$this->title = 'Agregar nueva Asignatura';
$this->params['breadcrumbs'][] = ['label' => 'Asignaturas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asignatura-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
