<?php

namespace backend\controllers;

use Yii;
use backend\models\Estudios;
use backend\models\EstudiosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\filters\AccessControl;

/**
 * EstudiosController implements the CRUD actions for Estudios model.
 */
class EstudiosController extends Controller
{
    public function behaviors()
    {
        return [
          'access'=>[
              'class'=>AccessControl::classname(),
              'only'=>['create','update','delete'],
              'rules'=>[
                  [
                    'allow'=>true,
                    'roles'=>['@']
                  ],
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Estudios models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EstudiosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Estudios model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Estudios model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */


    public function actionCreate()
    {
        $model = new Estudios();

        if ($model->load(Yii::$app->request->post()))
        {
            $imageName = $model->titulo;
            $imageEst = $model->codEstudiante;
            $imagens = $imageName.$imageEst;

            $model->file = UploadedFile::getInstance($model,'file');
            $model->file->saveAs( 'uploads/'.$imagens.'.'.$model->file->extension );
            $model->logo = 'uploads/'.$imagens.'.'.$model->file->extension;
            $model->save();

            return $this->redirect(['view', 'id' => $model->idEstudios]);

        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Estudios model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
          $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

          $imageName = $model->titulo;
          $imageEst = $model->codEstudiante;
          $imagens = $imageName.$imageEst;

          $model->file = UploadedFile::getInstance($model,'file');
          $model->file->saveAs( 'uploads/'.$imagens.'.'.$model->file->extension );
          $model->logo = 'uploads/'.$imagens.'.'.$model->file->extension;
          $model->save();


            return $this->redirect(['view', 'id' => $model->idEstudios]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Estudios model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Estudios model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Estudios the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Estudios::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
