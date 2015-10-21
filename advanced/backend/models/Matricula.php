<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "Matricula".
 *
 * @property integer $idMatricula
 * @property string $semestre
 * @property string $fecha
 * @property string $anioacad
 * @property integer $codEstudiante
 * @property integer $idFacultad
 *
 * @property Estudiantes $codEstudiante0
 * @property Facultad $idFacultad0
 * @property Detallemat[] $detallemats
 */
class Matricula extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Matricula';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['semestre', 'fecha', 'anioacad', 'codEstudiante', 'idFacultad'], 'required'],
            [['codEstudiante', 'idFacultad'], 'integer'],
            [['semestre', 'fecha', 'anioacad'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idMatricula' => 'Id Matricula',
            'semestre' => 'Semestre',
            'fecha' => 'Fecha',
            'anioacad' => 'Anioacad',
            'codEstudiante' => 'Cod Estudiante',
            'idFacultad' => 'Id Facultad',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodEstudiante0()
    {
        return $this->hasOne(Estudiantes::className(), ['codEstudiante' => 'codEstudiante']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdFacultad0()
    {
        return $this->hasOne(Facultad::className(), ['idFacultad' => 'idFacultad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetallemats()
    {
        return $this->hasMany(Detallemat::className(), ['idMatricula' => 'idMatricula']);
    }
}
