<?php
/**
 * Created by PhpStorm.
 * User: muhAlantabli
 * Date: 3/11/19
 * Time: 8:10 PM
 */

namespace app\models;


class SportCar extends Car
{
    CONST TYPE = 'sport';

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