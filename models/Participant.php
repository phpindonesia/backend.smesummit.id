<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "participants".
 *
 * @property int $id
 * @property string $name
 * @property string $company_name
 * @property string $position
 * @property string $coached_sector
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
            [['name', 'company_name', 'position', 'coached_sector', 'company_sector', 'email', 'phone', 'problem_desc', 'created_at'], 'required'],
            [['problem_desc'], 'string'],
            [['created_at'], 'safe'],
            [['name', 'company_name', 'position', 'coached_sector', 'company_sector', 'email', 'phone'], 'string', 'max' => 255],
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
            'coached_sector' => 'Coached Sector',
            'company_sector' => 'Company Sector',
            'email' => 'Email',
            'phone' => 'Phone',
            'problem_desc' => 'Problem Desc',
            'created_at' => 'Created At',
        ];
    }
}
