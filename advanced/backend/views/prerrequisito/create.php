<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Prerrequisito */

$this->title = 'Crear prerrequisitos';
$this->params['breadcrumbs'][] = ['label' => 'Prerrequisitos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prerrequisito-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelsDetallepre'=>$modelsDetallepre,
    ]) ?>

</div>
