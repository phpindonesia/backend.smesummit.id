<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Sponsor]].
 *
 * @see Sponsor
 */
class SponsorQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Sponsor[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Sponsor|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
