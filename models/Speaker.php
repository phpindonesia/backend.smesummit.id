<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "speaker".
 *
 * @property int $id
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
class Speaker extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'speaker';
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
            [['name', 'company_name', 'position', 'email', 'photo', 'last_education', 'experience', 'phone', 'company_sector', 'topic', 'created_at'], 'required'],
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
            'id' => 'ID',
            'name' => 'Name',
            'company_name' => 'Company Name',
            'position' => 'Position',
            'email' => 'Email',
            'photo' => 'Photo',
            'last_education' => 'Last Education',
            'experience' => 'Experience',
            'phone' => 'Phone',
            'company_sector' => 'Company Sector',
            'topic' => 'Topic',
            'created_at' => 'Created At',
        ];
    }
}
