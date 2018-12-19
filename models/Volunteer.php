<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "volunteers".
 *
 * @property string $id
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
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'email' => Yii::t('app', 'Email'),
            'phone' => Yii::t('app', 'Phone'),
            'why_you_apply_desc' => Yii::t('app', 'Why You Apply Desc'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return VolunteerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new VolunteerQuery(get_called_class());
    }
}
