<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Docentes */

$this->title = 'Agregar nuevo docente:';
$this->params['breadcrumbs'][] = ['label' => 'Docentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="docentes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
