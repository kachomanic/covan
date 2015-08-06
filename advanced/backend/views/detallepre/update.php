<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Detallepre */

$this->title = 'Update Detallepre: ' . ' ' . $model->iddetpre;
$this->params['breadcrumbs'][] = ['label' => 'Detallepres', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->iddetpre, 'url' => ['view', 'id' => $model->iddetpre]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="detallepre-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
