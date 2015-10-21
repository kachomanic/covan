<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "detallemat".
 *
 * @property integer $iddetalle
 * @property integer $nota
 * @property integer $idTipoa
 * @property integer $idGrupo
 * @property integer $idMatricula
 *
 * @property Grupo $idGrupo0
 * @property Matricula $idMatricula0
 * @property TipoAp $idTipoa0
 */
class Detallemat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detallemat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nota', 'idTipoa', 'idGrupo', 'idMatricula'], 'integer'],
            [['idTipoa', 'idGrupo'], 'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'iddetalle' => 'Iddetalle',
            'nota' => 'Nota',
            'idTipoa' => 'Id Tipoa',
            'idGrupo' => 'Id Grupo',
            'idMatricula' => 'Id Matricula',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdGrupo0()
    {
        return $this->hasOne(Grupo::className(), ['idGrupo' => 'idGrupo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdMatricula0()
    {
        return $this->hasOne(Matricula::className(), ['idMatricula' => 'idMatricula']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTipoa0()
    {
        return $this->hasOne(TipoAp::className(), ['idTipoa' => 'idTipoa']);
    }
}
