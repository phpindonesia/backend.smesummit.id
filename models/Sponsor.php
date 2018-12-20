<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sponsors".
 *
 * @property string $id
 * @property string $company_name
 * @property string $company_sector
 * @property string $email_pic
 * @property string $phone
 * @property string $sponsor_type
 * @property string $created_at
 */
class Sponsor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sponsors';
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
            [['company_name', 'company_sector', 'email_pic', 'phone', 'sponsor_type', 'created_at'], 'required'],
            [['sponsor_type'], 'string'],
            [['created_at'], 'safe'],
            [['company_name', 'company_sector', 'email_pic'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 32],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'company_name' => Yii::t('app', 'Company Name'),
            'company_sector' => Yii::t('app', 'Company Sector'),
            'email_pic' => Yii::t('app', 'Email Pic'),
            'phone' => Yii::t('app', 'Phone'),
            'sponsor_type' => Yii::t('app', 'Sponsor Type'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return SponsorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SponsorQuery(get_called_class());
    }
}
