<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "Prerrequisito".
 *
 * @property integer $idPrerreq
 * @property integer $idAsignatura
 *
 * @property Asignatura $idAsignatura0
 * @property Detallepre[] $detallepres
 */
class Prerrequisito extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Prerrequisito';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idAsignatura'], 'required'],
            [['idAsignatura'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
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
    public function getDetallepres()
    {
        return $this->hasMany(Detallepre::className(), ['idPrerreq' => 'idPrerreq']);
    }
}
