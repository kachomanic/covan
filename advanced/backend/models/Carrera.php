<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "carrera".
 *
 * @property integer $idcarrera
 * @property string $nombreca
 * @property integer $idPlan
 * @property integer $idFacultad
 */
class Carrera extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'carrera';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombreca', 'idPlan', 'idFacultad'], 'required'],
            [['idPlan', 'idFacultad'], 'integer'],
            [['nombreca'], 'string', 'max' => 70]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idcarrera' => 'Idcarrera',
            'nombreca' => 'Nombre de la carrera:',
            'idPlan' => 'Plan académico:',
            'idFacultad' => 'Facultad:',
        ];
    }

    public function getIdPlan0()
    {
        return $this->hasOne(Plan::className(), ['idPlan' => 'idPlan']);
    }

    public function getIdFacultad0()
    {
        return $this->hasOne(Facultad::className(), ['idFacultad' => 'idFacultad']);
    }

}
