<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "Especialidad".
 *
 * @property integer $idEspecialidad
 * @property string $nombree
 *
 * @property Docentes[] $docentes
 */
class Especialidad extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Especialidad';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombree'], 'required'],
            [['nombree'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idEspecialidad' => 'Id Especialidad',
            'nombree' => 'Especialidad',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocentes()
    {
        return $this->hasMany(Docentes::className(), ['idEspecialidad' => 'idEspecialidad']);
    }
}
