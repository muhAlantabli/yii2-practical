<?php
/**
 * Created by PhpStorm.
 * User: muhAlantabli
 * Date: 3/6/19
 * Time: 12:43 AM
 */

namespace app\models;

use yii\base\Model;

class CartAddForm extends Model
{
    public $productId;
    public $amount;

    public function rules()
    {
        return [
            [['productId', 'amount'], 'required'],
            [['amount'], 'integer', 'min' => 1],
        ];
    }
}