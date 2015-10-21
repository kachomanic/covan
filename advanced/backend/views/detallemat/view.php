<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Detallemat */

$this->title = $model->iddetalle;
$this->params['breadcrumbs'][] = ['label' => 'Detallemats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detallemat-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->iddetalle], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->iddetalle], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'iddetalle',
            'nota',
            'idTipoa',
            'idGrupo',
            'idMatricula',
        ],
    ]) ?>

</div>
