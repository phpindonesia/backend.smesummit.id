<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Voucher;

/**
 * VoucherSearch represents the model behind the search form of `app\models\Voucher`.
 */
class VoucherSearch extends Voucher
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'redeem_limit'], 'integer'],
            [['code', 'partner_name', 'partner_email', 'status', 'created_at', 'updated_at'], 'safe'],
            [['discount_percent', 'discount_amount', 'referral_percent', 'referral_amount'], 'number'],
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
        $query = Voucher::find();

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
            'discount_percent' => $this->discount_percent,
            'discount_amount' => $this->discount_amount,
            'referral_percent' => $this->referral_percent,
            'referral_amount' => $this->referral_amount,
            'redeem_limit' => $this->redeem_limit,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'partner_name', $this->partner_name])
            ->andFilterWhere(['like', 'partner_email', $this->partner_email])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
