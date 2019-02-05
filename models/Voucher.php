<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vouchers".
 *
 * @property int $id
 * @property string $code
 * @property string $discount_percent
 * @property string $discount_amount
 * @property string $partner_name
 * @property string $partner_email
 * @property string $referral_percent
 * @property string $referral_amount
 * @property int $redeem_limit
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 */
class Voucher extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vouchers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code'], 'required'],
            [['discount_percent', 'discount_amount', 'referral_percent', 'referral_amount'], 'number'],
            [['redeem_limit'], 'integer'],
            [['status'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['code'], 'string', 'max' => 20],
            [['partner_name', 'partner_email'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'code' => Yii::t('app', 'Code'),
            'discount_percent' => Yii::t('app', 'Discount Percent'),
            'discount_amount' => Yii::t('app', 'Discount Amount'),
            'partner_name' => Yii::t('app', 'Partner Name'),
            'partner_email' => Yii::t('app', 'Partner Email'),
            'referral_percent' => Yii::t('app', 'Referral Percent'),
            'referral_amount' => Yii::t('app', 'Referral Amount'),
            'redeem_limit' => Yii::t('app', 'Redeem Limit'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return VoucherQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new VoucherQuery(get_called_class());
    }
}
