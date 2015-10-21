<?php

namespace backend\controllers;

use Yii;
use backend\models\Prerrequisito;
use backend\models\PrerrequisitoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\Detallepre;
use backend\models\Model;


/**
 * PrerrequisitoController implements the CRUD actions for Prerrequisito model.
 */
class PrerrequisitoController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Prerrequisito models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PrerrequisitoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Prerrequisito model.
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
     * Creates a new Prerrequisito model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Prerrequisito();
        $modelsDetallepre = [new Detallepre];

        if ($model->load(Yii::$app->request->post()) && $model->save())
        {
          $modelsDetallepre = Model::createMultiple(Detallepre::classname());
          Model::loadMultiple($modelsDetallepre, Yii::$app->request->post());

       // validate all models
       $valid = $model->validate();
       $valid = Model::validateMultiple($modelsDetallepre) && $valid;

       if ($valid) {
           $transaction = \Yii::$app->db->beginTransaction();
           try {
               if ($flag = $model->save(false)) {
                   foreach ($modelsDetallepre as $modelsDetallepre)
                   {
                       $modelsDetallepre->idPrerreq = $model->idPrerreq;
                       if (! ($flag = $modelsDetallepre->save(false))) {
                           $transaction->rollBack();
                           break;
                       }
                   }
               }
               if ($flag) {
                   $transaction->commit();
                   return $this->redirect(['view', 'id' => $model->idPrerreq]);
               }
           } catch (Exception $e) {
               $transaction->rollBack();
           }
       }
       return $this->redirect(['view','id' => $model->idPrerreq]);
        }
        else {
            return $this->render('create', [
                'model' => $model,
                'modelsDetallepre' => (empty($modelsDetallepre)) ? [new Detallepre] : $modelsDetallepre
            ]);
        }
    }

    /**
     * Updates an existing Prerrequisito model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idPrerreq]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Prerrequisito model.
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
     * Finds the Prerrequisito model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Prerrequisito the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Prerrequisito::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
