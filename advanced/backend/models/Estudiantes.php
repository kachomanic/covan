<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "Estudiantes".
 *
 * @property integer $codEstudiante
 * @property string $carnetEst
 * @property string $fechaIngreso
 * @property string $teleDomicilio
 * @property string $direccionDomicilio
 * @property string $cedula
 * @property string $fechaNac
 * @property string $lugarNac
 * @property string $nomapes
 *
 * @property Estudios[] $estudios
 * @property Matricula[] $matriculas
 */
class Estudiantes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Estudiantes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fechaIngreso', 'teleDomicilio', 'direccionDomicilio', 'cedula', 'fechaNac', 'lugarNac', 'nomapes'], 'required'],
            [['fechaIngreso', 'fechaNac'], 'safe'],
            [['carnetEst'], 'string', 'max' => 15],
            [['teleDomicilio', 'cedula'], 'string', 'max' => 20],
            [['direccionDomicilio'], 'string', 'max' => 100],
            [['lugarNac', 'nomapes'], 'string', 'max' => 70],
            [['cedula'], 'unique'],
            [['carnetEst'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'codEstudiante' => 'Codigo del estudiante:',
            'carnetEst' => 'Carnet:',
            'fechaIngreso' => 'Fecha de ingreso:',
            'teleDomicilio' => 'Telefono domiciliar:',
            'direccionDomicilio' => 'Direccion de domicilio:',
            'cedula' => 'Cedula:',
            'fechaNac' => 'Fecha de nacimiento:',
            'lugarNac' => 'Lugar de nacimiento:',
            'nomapes' => 'Nombres y apellidos:',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstudios()
    {
        return $this->hasMany(Estudios::className(), ['codEstudiante' => 'codEstudiante']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMatriculas()
    {
        return $this->hasMany(Matricula::className(), ['codEstudiante' => 'codEstudiante']);
    }
}
