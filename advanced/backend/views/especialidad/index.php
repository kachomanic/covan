<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\EspecialidadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lista de especialidades:';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="especialidad-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Agregar especialidad', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idEspecialidad',
            'nombree',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
