<?php
/**
 * Created by PhpStorm.
 * User: muhAlantabli
 * Date: 3/11/19
 * Time: 8:14 PM
 */

namespace app\models;


class FamilyCar extends Car
{
    CONST TYPE = 'family';

    /**
     * @return CarQuery
     */
    public static function find()
    {
        return new CarQuery(get_called_class(), ['where' => ['type' => self::TYPE]]);
    }

    /**
     * @param bool $insert
     * @return bool
     */
    public function beforeSave($insert)
    {
        $this->type = self::TYPE;
        return parent::beforeSave($insert);
    }

}