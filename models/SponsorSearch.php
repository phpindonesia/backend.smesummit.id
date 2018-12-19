<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Sponsor;

/**
 * SponsorSearch represents the model behind the search form of `app\models\Sponsor`.
 */
class SponsorSearch extends Sponsor
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['company_name', 'company_sector', 'email_pic', 'phone', 'sponsor_type', 'created_at'], 'safe'],
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
        $query = Sponsor::find();

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
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'company_name', $this->company_name])
            ->andFilterWhere(['like', 'company_sector', $this->company_sector])
            ->andFilterWhere(['like', 'email_pic', $this->email_pic])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'sponsor_type', $this->sponsor_type]);

        return $dataProvider;
    }
}
