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
use yii\filters\AccessControl;
/**
 * PrerrequisitoController implements the CRUD actions for Prerrequisito model.
 */
class PrerrequisitoController extends Controller
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
        $modelsdetallepre = [new Detallepre];

        if ($model->load(Yii::$app->request->post()) && $model->save())
        {
          $modelsdetallepre = Model::createMultiple(Detallepre::classname());
          Model::loadMultiple($modelsdetallepre, Yii::$app->request->post());

          // validate all models
          $valid = $model->validate();
          $valid = Model::validateMultiple($modelsdetallepre) && $valid;

          if ($valid) {
              $transaction = \Yii::$app->db->beginTransaction();
              try {
                  if ($flag = $model->save(false))
                  {
                      foreach ($modelsdetallepre as $modeldetallepre)
                      {
                          $modeldetallepre->idPrerreq = $model->idAsignatura;
                          if (! ($flag = $modeldetallepre->save(false))) {
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
////////////////////////////////////
        }
        else {
            return $this->render('create', [
                'model' => $model,
                'modelsdetallepre' => (empty($modelsdetallepre)) ? [new Detallepre] : $modelsdetallepre
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
        $modelsdetallepre = [new Detallepre];

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

          $oldIDs = ArrayHelper::map($modelsdetallepre, 'idPrerreq', 'idPrerreq');
          $modelsdetallepre = Model::createMultiple(Address::classname(), $modelsdetallepre);
          Model::loadMultiple($modelsdetallepre, Yii::$app->request->post());
          $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsdetallepre, 'id', 'id')));

          // ajax validation
          if (Yii::$app->request->isAjax) {
              Yii::$app->response->format = Response::FORMAT_JSON;
              return ArrayHelper::merge(
                  ActiveForm::validateMultiple($modelsdetallepre),
                  ActiveForm::validate($model)
              );
          }

          // validate all models
          $valid = $model->validate();
          $valid = Model::validateMultiple($modelsdetallepre) && $valid;

          if ($valid) {
              $transaction = \Yii::$app->db->beginTransaction();
              try {
                  if ($flag = $model->save(false)) {
                      if (! empty($deletedIDs)) {
                          Address::deleteAll(['idPrerreq' => $deletedIDs]);
                      }
                      foreach ($modelsdetallepre as $modeldetallepre) {
                          $modeldetallepre->idPrerreq = $model->idPrerreq;
                          if (! ($flag = $modeldetallepre->save(false))) {
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
