<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Especialidad;

/**
 * EspecialidadSearch represents the model behind the search form about `backend\models\Especialidad`.
 */
class EspecialidadSearch extends Especialidad
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idEspecialidad'], 'integer'],
            [['nombree'], 'safe'],
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
        $query = Especialidad::find();

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
            'idEspecialidad' => $this->idEspecialidad,
        ]);

        $query->andFilterWhere(['like', 'nombree', $this->nombree]);

        return $dataProvider;
    }
}
