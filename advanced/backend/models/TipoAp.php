<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "TipoAp".
 *
 * @property integer $idTipoa
 * @property string $descripcion
 *
 * @property Detallemat[] $detallemats
 */
class TipoAp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'TipoAp';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion'], 'string', 'max' => 25]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idTipoa' => 'Id Tipoa',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetallemats()
    {
        return $this->hasMany(Detallemat::className(), ['idTipoa' => 'idTipoa']);
    }
}
