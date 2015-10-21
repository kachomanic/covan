<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Detallemat */

$this->title = 'Create Detallemat';
$this->params['breadcrumbs'][] = ['label' => 'Detallemats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detallemat-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
