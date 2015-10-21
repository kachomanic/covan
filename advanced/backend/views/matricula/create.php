<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Matricula */

$this->title = 'Create Matricula';
$this->params['breadcrumbs'][] = ['label' => 'Matriculas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="matricula-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modeldetallemat' =>$modeldetallemat,
    ]) ?>

</div>
