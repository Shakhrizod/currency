<?php

namespace app\models;

use DateTime;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * CurrencySearch represents the model behind the search form of `app\models\Currency`.
 */
class CurrencySearch extends Currency
{

    public $from;
    public $to;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'num_code'], 'integer'],
            [['valute_id', 'char_code', 'name', 'value', 'date', 'from', 'to'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Currency::find();

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
        if ($this->from && $this->to){
            $query->andFilterWhere(['between', 'date', $this->from, $this->to]);
        }else{
            $query->andFilterWhere(['date' => $this->date]);
        }
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'num_code' => $this->num_code,
        ]);

        $query->andFilterWhere(['ilike', 'valute_id', $this->valute_id])
            ->andFilterWhere(['ilike', 'char_code', $this->char_code])
            ->andFilterWhere(['ilike', 'name', $this->name])
            ->andFilterWhere(['ilike', 'value', $this->value]);

        return $dataProvider;
    }

}
