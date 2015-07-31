<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Estudios */

$this->title = $model->idEstudios;
$this->params['breadcrumbs'][] = ['label' => 'Estudioasss', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estudios-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->idEstudios], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->idEstudios], [
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
            'idEstudios',
            'lugar',
            'titulo',
            'fecha',
            'codEstudiante0.nomapes',
            'logo',
        ],
    ])
    ?>

    <a href="<?=$model->logo?>"><img src="<?=$model->logo?>" width="150px" height="150px"></a>

</div>
