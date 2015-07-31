<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "Grupo".
 *
 * @property integer $idGrupo
 * @property integer $idDocente
 * @property integer $idAsignatura
 * @property integer $idPlan
 *
 * @property Asignatura $idAsignatura0
 * @property Docentes $idDocente0
 * @property Plan $idPlan0
 * @property Detallemat[] $detallemats
 */
class Grupo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Grupo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idDocente', 'idAsignatura', 'idPlan'], 'required'],
            [['idDocente', 'idAsignatura', 'idPlan'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idGrupo' => 'Código de grupo',
            'idDocente' => 'Docente',
            'idAsignatura' => 'Asignatura',
            'idPlan' => 'Plan',
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
    public function getIdDocente0()
    {
        return $this->hasOne(Docentes::className(), ['idDocente' => 'idDocente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPlan0()
    {
        return $this->hasOne(Plan::className(), ['idPlan' => 'idPlan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetallemats()
    {
        return $this->hasMany(Detallemat::className(), ['idGrupo' => 'idGrupo']);
    }
}
