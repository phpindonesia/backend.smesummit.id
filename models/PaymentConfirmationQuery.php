<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[PaymentConfirmation]].
 *
 * @see PaymentConfirmation
 */
class PaymentConfirmationQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return PaymentConfirmation[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return PaymentConfirmation|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
