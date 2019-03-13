<?php
/**
 * Created by PhpStorm.
 * User: muhAlantabli
 * Date: 3/13/19
 * Time: 6:21 PM
 */

namespace app\helpers;


class NumberHelper
{
    /**
     * helper method to format numbers
     * @param $number
     * @param int $double
     * @return string
     */
    public static function format($number, $double = 2)
    {
        return number_format($number, $double, '.', ',');
    }

}