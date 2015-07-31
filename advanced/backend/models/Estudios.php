<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "Estudios".
 *
 * @property integer $idEstudios
 * @property string $lugar
 * @property string $titulo
 * @property string $fecha
 * @property integer $codEstudiante
 *
 * @property Estudiantes $codEstudiante0
 */
class Estudios extends \yii\db\ActiveRecord
{

    public $file;

    public static function tableName()
    {
        return 'Estudios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codEstudiante'], 'required'],
            [['codEstudiante'], 'integer'],
            [['lugar','titulo'], 'string', 'max' => 250],
            [['logo'], 'string', 'max' => 250],
            [['fecha'], 'safe'],
            [['file'],'file']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idEstudios' => 'Id Estudios',
            'lugar' => 'Institución que lo extendio:',
            'titulo' => 'Titulo obtenido:',
            'fecha' => 'Fecha de emisión:',
            'codEstudiante' => 'Estudiante',
            'logo' => 'Certificado',
            'file' => 'Certificado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodEstudiante0()
    {
        return $this->hasOne(Estudiantes::className(), ['codEstudiante' => 'codEstudiante']);
    }
}
