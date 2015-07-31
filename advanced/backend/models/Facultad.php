<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "Facultad".
 *
 * @property integer $idFacultad
 * @property string $nombref
 *
 * @property Plan[] $plans
 */
class Facultad extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Facultad';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombref'], 'required'],
            [['nombref'], 'string', 'max' => 40]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idFacultad' => 'Código de la facultad',
            'nombref' => 'Nombre de la facultad',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlans()
    {
        return $this->hasMany(Plan::className(), ['idFacultad' => 'idFacultad']);
    }
}
