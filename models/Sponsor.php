<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sponsors".
 *
 * @property int $id
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
            'id' => 'ID',
            'company_name' => 'Company Name',
            'company_sector' => 'Company Sector',
            'email_pic' => 'Email Pic',
            'phone' => 'Phone',
            'sponsor_type' => 'Sponsor Type',
            'created_at' => 'Created At',
        ];
    }
}
