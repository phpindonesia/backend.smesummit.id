<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PaymentConfirmation;

/**
 * PaymentConfirmationSearch represents the model behind the search form of `app\models\PaymentConfirmation`.
 */
class PaymentConfirmationSearch extends PaymentConfirmation
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'email_user_id'], 'integer'],
            [['phone', 'total_payment', 'payment_type', 'date_transfer', 'no_ref', 'bank_name', 'bank_username', 'screenshot', 'notes', 'status', 'created_at'], 'safe'],
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
        $query = PaymentConfirmation::find();

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
            'email_user_id' => $this->email_user_id,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'total_payment', $this->total_payment])
            ->andFilterWhere(['like', 'payment_type', $this->payment_type])
            ->andFilterWhere(['like', 'date_transfer', $this->date_transfer])
            ->andFilterWhere(['like', 'no_ref', $this->no_ref])
            ->andFilterWhere(['like', 'bank_name', $this->bank_name])
            ->andFilterWhere(['like', 'bank_username', $this->bank_username])
            ->andFilterWhere(['like', 'screenshot', $this->screenshot])
            ->andFilterWhere(['like', 'notes', $this->notes])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
