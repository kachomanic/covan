<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Grupo;

/**
 * GrupoSearch represents the model behind the search form about `backend\models\Grupo`.
 */
class GrupoSearch extends Grupo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idGrupo', 'idDocente', 'idAsignatura', 'idPlan'], 'integer'],
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
        $query = Grupo::find();

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
            'idGrupo' => $this->idGrupo,
            'idDocente' => $this->idDocente,
            'idAsignatura' => $this->idAsignatura,
            'idPlan' => $this->idPlan,
        ]);

        return $dataProvider;
    }
}
