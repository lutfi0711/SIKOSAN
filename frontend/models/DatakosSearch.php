<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Datakos;

/**
 * DatakosSearch represents the model behind the search form of `frontend\models\Datakos`.
 */
class DatakosSearch extends Datakos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'biaya', 'create_by', 'update_by'], 'integer'],
            [['nama', 'alamat', 'fasilitas', 'create_at', 'update_at'], 'safe'],
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
        $query = Datakos::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'biaya' => $this->biaya,
            'create_by' => $this->create_by,
            'update_by' => $this->update_by,
            'create_at' => $this->create_at,
            'update_at' => $this->update_at,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'fasilitas', $this->fasilitas]);

        return $dataProvider;
    }
}
