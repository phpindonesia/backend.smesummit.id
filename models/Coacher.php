<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "coachers".
 *
 * @property string $id
 * @property string $name
 * @property string $company_name
 * @property string $position
 * @property string $email
 * @property string $photo
 * @property string $last_education
 * @property string $experience
 * @property string $phone
 * @property string $company_sector
 * @property string $topic
 * @property string $created_at
 */
class Coacher extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'coachers';
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
            [['name', 'company_name', 'position', 'email', 'last_education', 'experience', 'phone', 'company_sector', 'topic'], 'required'],
            [['experience'], 'string'],
            [['created_at'], 'safe'],
            [['name', 'company_name', 'email', 'photo', 'topic'], 'string', 'max' => 255],
            [['position', 'last_education'], 'string', 'max' => 64],
            [['phone', 'company_sector'], 'string', 'max' => 32],
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
            'email' => Yii::t('app', 'Email'),
            'photo' => Yii::t('app', 'Photo'),
            'last_education' => Yii::t('app', 'Last Education'),
            'experience' => Yii::t('app', 'Experience'),
            'phone' => Yii::t('app', 'Phone'),
            'company_sector' => Yii::t('app', 'Company Sector'),
            'topic' => Yii::t('app', 'Topic'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return CoacherQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CoacherQuery(get_called_class());
    }
}
