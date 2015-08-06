<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Detallepre */

$this->title = 'Create Detallepre';
$this->params['breadcrumbs'][] = ['label' => 'Detallepres', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detallepre-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
