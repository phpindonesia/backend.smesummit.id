<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Volunteer]].
 *
 * @see Volunteer
 */
class VolunteerQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Volunteer[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Volunteer|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
