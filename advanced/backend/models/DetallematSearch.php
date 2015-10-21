<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Detallemat;

/**
 * DetallematSearch represents the model behind the search form about `backend\models\Detallemat`.
 */
class DetallematSearch extends Detallemat
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['iddetalle', 'nota', 'idTipoa', 'idGrupo', 'idMatricula'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Detallemat::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'iddetalle' => $this->iddetalle,
            'nota' => $this->nota,
            'idTipoa' => $this->idTipoa,
            'idGrupo' => $this->idGrupo,
            'idMatricula' => $this->idMatricula,
        ]);

        return $dataProvider;
    }
}
