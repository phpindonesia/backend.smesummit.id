<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "participants".
 *
 * @property string $id
 * @property string $name
 * @property string $company_name
 * @property string $position
 * @property string $sector_to_be_coached
 * @property string $company_sector
 * @property string $email
 * @property string $phone
 * @property string $problem_desc
 * @property string $created_at
 */
class Participant extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'participants';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db2');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'company_name', 'position', 'sector_to_be_coached', 'company_sector', 'email', 'phone', 'problem_desc', 'created_at'], 'required'],
            [['problem_desc', 'status', 'payment_instruction_email_sent'], 'string'],
            [['payment_amount'], 'number'],
            [['created_at'], 'safe'],
            [['name', 'company_name', 'position', 'sector_to_be_coached', 'company_sector', 'email', 'phone'], 'string', 'max' => 255],
            [['voucher_code'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'company_name' => Yii::t('app', 'Company Name'),
            'position' => Yii::t('app', 'Position'),
            'sector_to_be_coached' => Yii::t('app', 'Coached Sector'),
            'company_sector' => Yii::t('app', 'Company Sector'),
            'email' => Yii::t('app', 'Email'),
            'phone' => Yii::t('app', 'Phone'),
            'problem_desc' => Yii::t('app', 'Problem Desc'),
            'voucher_code' => Yii::t('app', 'Voucher Code'),
            'payment_amount' => Yii::t('app', 'Payment Amount'), 
            'payment_instruction_email_sent' => Yii::t('app', 'Payment Instruction Email Sent'), 
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }

    function getDescription()
    {
        return "{$this->name} ({$this->email})";
    }

   /**
    * @return \yii\db\ActiveQuery
    */
    public function getPaymentConfirmations()
    {
        return $this->hasMany(PaymentConfirmation::className(), ['email_user_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return ParticipantQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ParticipantQuery(get_called_class());
    }
}
