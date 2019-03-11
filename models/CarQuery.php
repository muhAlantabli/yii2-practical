<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Car]].
 *
 * @see Car
 */
class CarQuery extends \yii\db\ActiveQuery
{
    public $type;
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Car[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Car|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }


    /**
     * @param /yii/db/QueryBuilder $builder
     * @return \yii\db\ActiveQuery
     */
    public function prepare($builder)
    {
        if ($this->type !== null) {
            $this->andWhere(['type' => $this->type]);
        }
        return parent::prepare($builder);
    }
}
