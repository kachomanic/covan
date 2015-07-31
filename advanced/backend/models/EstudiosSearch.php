<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Estudios;

/**
 * EstudiosSearch represents the model behind the search form about `backend\models\Estudios`.
 */
class EstudiosSearch extends Estudios
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idEstudios', 'codEstudiante'], 'integer'],
            [['lugar', 'titulo', 'fecha'], 'safe'],
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
        $query = Estudios::find();

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
            'idEstudios' => $this->idEstudios,
            'fecha' => $this->fecha,
            'codEstudiante' => $this->codEstudiante,
        ]);

        $query->andFilterWhere(['like', 'lugar', $this->lugar])
            ->andFilterWhere(['like', 'titulo', $this->titulo]);

        return $dataProvider;
    }
}
