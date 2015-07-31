<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "plan".
 *
 * @property integer $idPlan
 * @property string $nombrep
 * @property integer $idFacultad
 *
 * @property Facultad $idFacultad0
 */
class Plan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'plan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idFacultad'], 'required'],
            [['idFacultad'], 'integer'],
            [['nombrep'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idPlan' => 'Id Plan',
            'nombrep' => 'Nombre del plan',
            'idFacultad' => 'Facultad',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdFacultad0()
    {
        return $this->hasOne(Facultad::className(), ['idFacultad' => 'idFacultad']);
    }
}
