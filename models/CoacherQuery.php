<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Coacher]].
 *
 * @see Coacher
 */
class CoacherQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Coacher[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Coacher|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
