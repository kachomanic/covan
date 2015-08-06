<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Detallepre */

$this->title = $model->iddetpre;
$this->params['breadcrumbs'][] = ['label' => 'Detallepres', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detallepre-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->iddetpre], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->iddetpre], [
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
            'iddetpre',
            'idPrerreq',
            'idAsignatura',
        ],
    ]) ?>

</div>
