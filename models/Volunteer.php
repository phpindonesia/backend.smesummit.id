<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "volunteers".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $why_you_apply_desc
 * @property string $created_at
 */
class Volunteer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'volunteers';
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
            [['name', 'email', 'phone', 'why_you_apply_desc', 'created_at'], 'required'],
            [['why_you_apply_desc'], 'string'],
            [['created_at'], 'safe'],
            [['name', 'email'], 'string', 'max' => 255],
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
            'name' => 'Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'why_you_apply_desc' => 'Why You Apply Desc',
            'created_at' => 'Created At',
        ];
    }
}
