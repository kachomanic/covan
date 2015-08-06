<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "detallepre".
 *
 * @property integer $iddetpre
 * @property integer $idPrerreq
 * @property integer $idAsignatura
 *
 * @property Asignatura $idAsignatura0
 * @property Prerrequisito $idPrerreq0
 */
class Detallepre extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detallepre';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
          //  [['idPrerreq', 'idAsignatura'], 'required'],
            [['idPrerreq', 'idAsignatura'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'iddetpre' => 'Iddetpre',
            'idPrerreq' => 'Id Prerreq',
            'idAsignatura' => 'Id Asignatura',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAsignatura0()
    {
        return $this->hasOne(Asignatura::className(), ['idAsignatura' => 'idAsignatura']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPrerreq0()
    {
        return $this->hasOne(Prerrequisito::className(), ['idPrerreq' => 'idPrerreq']);
    }
}
