<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "Asignatura".
 *
 * @property integer $idAsignatura
 * @property string $nombrea
 *
 * @property Grupo[] $grupos
 * @property Prerrequisito[] $prerrequisitos
 * @property Detallepre[] $detallepres
 */
class Asignatura extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Asignatura';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombrea'], 'required'],
            [['nombrea'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idAsignatura' => 'Id Asignatura',
            'nombrea' => 'Nombre de asignatura',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrupos()
    {
        return $this->hasMany(Grupo::className(), ['idAsignatura' => 'idAsignatura']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrerrequisitos()
    {
        return $this->hasMany(Prerrequisito::className(), ['idAsignatura' => 'idAsignatura']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetallepres()
    {
        return $this->hasMany(Detallepre::className(), ['idAsignatura' => 'idAsignatura']);
    }
}
