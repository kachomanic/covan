<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Prerrequisito;

/**
 * PrerrequisitoSearch represents the model behind the search form about `backend\models\Prerrequisito`.
 */
class PrerrequisitoSearch extends Prerrequisito
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idPrerreq', 'idAsignatura'], 'integer'],
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
        $query = Prerrequisito::find();

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
            'idPrerreq' => $this->idPrerreq,
            'idAsignatura' => $this->idAsignatura,
        ]);

        return $dataProvider;
    }
}
