<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Estudiantes */

$this->title = 'Agregar nuevo estudiante:';
$this->params['breadcrumbs'][] = ['label' => 'Estudiantes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estudiantes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
