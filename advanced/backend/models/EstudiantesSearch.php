<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Estudiantes;

/**
 * EstudiantesSearch represents the model behind the search form about `backend\models\Estudiantes`.
 */
class EstudiantesSearch extends Estudiantes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codEstudiante'], 'integer'],
            [['carnetEst', 'fechaIngreso', 'teleDomicilio', 'direccionDomicilio', 'cedula', 'fechaNac', 'lugarNac', 'nomapes'], 'safe'],
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
        $query = Estudiantes::find();

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
            'codEstudiante' => $this->codEstudiante,
            'fechaIngreso' => $this->fechaIngreso,
            'fechaNac' => $this->fechaNac,
        ]);

        $query->andFilterWhere(['like', 'carnetEst', $this->carnetEst])
            ->andFilterWhere(['like', 'teleDomicilio', $this->teleDomicilio])
            ->andFilterWhere(['like', 'direccionDomicilio', $this->direccionDomicilio])
            ->andFilterWhere(['like', 'cedula', $this->cedula])
            ->andFilterWhere(['like', 'lugarNac', $this->lugarNac])
            ->andFilterWhere(['like', 'nomapes', $this->nomapes]);

        return $dataProvider;
    }
}
