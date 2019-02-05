<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Voucher]].
 *
 * @see Voucher
 */
class VoucherQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Voucher[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Voucher|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
