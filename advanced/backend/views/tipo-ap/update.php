<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TipoAp */

$this->title = 'Update Tipo Ap: ' . ' ' . $model->idTipoa;
$this->params['breadcrumbs'][] = ['label' => 'Tipo Aps', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idTipoa, 'url' => ['view', 'id' => $model->idTipoa]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tipo-ap-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
