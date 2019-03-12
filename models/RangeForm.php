<?php

namespace app\models;

use yii\base\Model;

class RangeForm extends Model
{
    public $from;
    public $to;

    /**
     * here way compare if $from <= $to
     * @return array
     */
    public function rules()
    {
        return [
            [['from', 'to'], 'integer'],
            ['from', 'compare', 'compareAttribute' => 'to', 'operator' => '<=']
        ];
    }
}
