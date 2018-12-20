<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "speaker".
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
 * @property string $sector
 * @property string $topic
 * @property string $created_at
 */
class Speaker extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'speakers';
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
            [['name', 'company_name', 'position', 'email', 'photo', 'last_education', 'experience', 'phone', 'sector', 'topic', 'created_at'], 'required'],
            [['experience'], 'string'],
            [['created_at'], 'safe'],
            [['name', 'company_name', 'email', 'photo', 'topic'], 'string', 'max' => 255],
            [['position', 'last_education'], 'string', 'max' => 64],
            [['phone', 'sector'], 'string', 'max' => 32],
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
            'sector' => Yii::t('app', 'Company Sector'),
            'topic' => Yii::t('app', 'Topic'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return SpeakerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SpeakerQuery(get_called_class());
    }
}
