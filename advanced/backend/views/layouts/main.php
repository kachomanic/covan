<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => 'UNIVERSIDAD NACIONAL ADVENTISTA DE NICARAGUA',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            $menuItems = [
                ['label' => 'Home', 'url' => ['/site/index']],
            ];
            if (Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
            } else {
              $menuItems[] =['label' => 'Catálogo', 'items' => [
                      ['label' => 'Estudiantes', 'url' => ['/estudiantes/index']],
                      ['label' => 'Docentes', 'url' => ['/docentes/index']],
                      ['label' => 'Especialidades', 'url' => ['/especialidad/index']],
                      ['label' => 'Asignaturas', 'url' => ['/asignatura/index']],
                      ['label' => 'Estudios', 'url' => ['/estudios/index']],
                      ['label' => 'Facultades', 'url' => ['/facultad/index']],
                      ['label' => 'Grupos', 'url' => ['/grupo/index']],
                      ['label' => 'Planes', 'url' => ['/plan/index']],
                      ['label' => 'Prerrequisitos', 'url' => ['/prerrequisito/index']],
                  ]];
                  $menuItems[] =['label' => 'Operaciones', 'items' => [
                          ['label' => 'Matricular', 'url' => ['/estudiantes/index']],
                          ['label' => 'Ingresar notas', 'url' => ['/estudiantes/index']],
                      ]];
                  $menuItems[] =['label' => 'Informes', 'items' => [
                          ['label' => 'Plan academico', 'url' => ['/estudiantes/index']],
                          ['label' => 'Avance de plan', 'url' => ['/estudiantes/index']],
                          ['label' => 'Prerrequisitos', 'url' => ['/estudiantes/index']],
                      ]];

                $menuItems[] = [
                    'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ];
            }
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
            ]);
            NavBar::end();
        ?>

        <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
        <p class="pull-left">&copy; UNADENIC <?= date('Y') ?></p>
        <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
