<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Speaker]].
 *
 * @see Speaker
 */
class SpeakerQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Speaker[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Speaker|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
