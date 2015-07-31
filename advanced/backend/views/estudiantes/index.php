<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\EstudiantesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lista de Estudiantes:';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estudiantes-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Agregar Estudiante', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'codEstudiante',
            'carnetEst',
            'fechaIngreso',
            'teleDomicilio',
            'direccionDomicilio',
            // 'cedula',
            // 'fechaNac',
            // 'lugarNac',
            // 'nomapes',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
