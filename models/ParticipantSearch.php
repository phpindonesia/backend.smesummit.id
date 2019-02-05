<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Participant;

/**
 * ParticipantSearch represents the model behind the search form of `app\models\Participant`.
 */
class ParticipantSearch extends Participant
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name', 'company_name', 'company_sector', 'position', 'sector_to_be_coached', 'email', 'phone', 'problem_desc', 'status', 'voucher_code', 'payment_instruction_email_sent', 'created_at'], 'safe'],
            [['payment_amount'], 'number'],
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
        $query = Participant::find();

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
            'payment_amount' => $this->payment_amount, 
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'company_name', $this->company_name])
            ->andFilterWhere(['like', 'position', $this->position])
            ->andFilterWhere(['like', 'sector_to_be_coached', $this->sector_to_be_coached])
            ->andFilterWhere(['like', 'company_sector', $this->company_sector])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'problem_desc', $this->problem_desc])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'voucher_code', $this->voucher_code])
            ->andFilterWhere(['like', 'payment_instruction_email_sent', $this->payment_instruction_email_sent]);
 
        return $dataProvider;
    }
}
