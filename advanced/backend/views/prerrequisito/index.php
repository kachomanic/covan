<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PrerrequisitoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Prerrequisitos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prerrequisito-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Prerrequisito', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idPrerreq',
            'idAsignatura',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
