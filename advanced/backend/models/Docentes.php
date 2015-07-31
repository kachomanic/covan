<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "Docentes".
 *
 * @property integer $idDocente
 * @property string $carnetDocente
 * @property string $nombres
 * @property string $cedula
 * @property string $telefono
 * @property string $celular
 * @property string $correo
 * @property integer $idEspecialidad
 *
 * @property Especialidad $idEspecialidad0
 * @property Grupo[] $grupos
 */
class Docentes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Docentes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombres', 'cedula', 'telefono', 'idEspecialidad'], 'required'],
            [['idEspecialidad'], 'integer'],
            [['carnetDocente'], 'string', 'max' => 15],
            [['nombres'], 'string', 'max' => 70],
            [['cedula'], 'string', 'max' => 20],
            [['telefono', 'celular'], 'string', 'max' => 10],
            [['correo'], 'string', 'max' => 40]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idDocente' => 'Id Docente',
            'carnetDocente' => 'Carnet docente:',
            'nombres' => 'Nombres y apellidos:',
            'cedula' => 'Cédula:',
            'telefono' => 'Teléfono:',
            'celular' => 'Celular:',
            'correo' => 'Correo:',
            'idEspecialidad' => 'Especialidad:',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEspecialidad0()
    {
        return $this->hasOne(Especialidad::className(), ['idEspecialidad' => 'idEspecialidad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrupos()
    {
        return $this->hasMany(Grupo::className(), ['idDocente' => 'idDocente']);
    }
}
