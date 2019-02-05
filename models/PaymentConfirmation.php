<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "payment_confirmation".
 *
 * @property string $id
 * @property string $email_user_id
 * @property string $phone
 * @property string $total_payment
 * @property string $payment_type
 * @property string $date_transfer
 * @property string $no_ref
 * @property string $bank_name
 * @property string $bank_username
 * @property string $screenshot
 * @property string $notes
 * @property string $status
 * @property string $created_at
 *
 * @property Participant $emailUser
 */
class PaymentConfirmation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payment_confirmation';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email_user_id'], 'integer'],
            [['phone', 'total_payment', 'payment_type', 'date_transfer', 'no_ref', 'bank_name', 'bank_username'], 'required'],
            [['payment_type', 'screenshot', 'notes', 'status'], 'string'],
            [['created_at'], 'safe'],
            [['phone', 'total_payment', 'no_ref'], 'string', 'max' => 255],
            [['date_transfer', 'bank_name', 'bank_username'], 'string', 'max' => 64],
            [['email_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Participant::className(), 'targetAttribute' => ['email_user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'email_user_id' => Yii::t('app', 'Email User ID'),
            'phone' => Yii::t('app', 'Phone'),
            'total_payment' => Yii::t('app', 'Total Payment'),
            'payment_type' => Yii::t('app', 'Payment Type'),
            'date_transfer' => Yii::t('app', 'Date Transfer'),
            'no_ref' => Yii::t('app', 'No Ref'),
            'bank_name' => Yii::t('app', 'Bank Name'),
            'bank_username' => Yii::t('app', 'Bank Username'),
            'screenshot' => Yii::t('app', 'Screenshot'),
            'notes' => Yii::t('app', 'Notes'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParticipant()
    {
        return $this->hasOne(Participant::className(), ['id' => 'email_user_id']);
    }

    /**
     * {@inheritdoc}
     * @return PaymentConfirmationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PaymentConfirmationQuery(get_called_class());
    }
}
