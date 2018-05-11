<?php

namespace backend\modules\userOnline\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\userOnline\models\Useronline;

/**
 * UseronlineSearch represents the model behind the search form about `backend\modules\userOnline\models\Useronline`.
 */
class UseronlineSearch extends Useronline
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'TIME_SS', 'STATUS'], 'integer'],
            [['IP', 'USER', 'LOCAL'], 'safe'],
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
        $query = Useronline::find();

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
            'ID' => $this->ID,
            'TIME_SS' => $this->TIME_SS,
            'STATUS' => $this->STATUS,
        ]);

        $query->andFilterWhere(['like', 'IP', $this->IP])
            ->andFilterWhere(['like', 'USER', $this->USER])
            ->andFilterWhere(['like', 'LOCAL', $this->LOCAL]);

        return $dataProvider;
    }
}
