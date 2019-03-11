<?php
/**
 * Created by PhpStorm.
 * User: muhAlantabli
 * Date: 3/11/19
 * Time: 11:19 PM
 */

namespace app\components;


use yii\validators\Validator;

class WordsValidator extends Validator
{
    public $size = 25;

    /**
     * Validate the given string has words less than given number
     * @param string $value
     * @return array|bool
     */
    public function validateValue($value)
    {
        if (str_word_count($value) > $this->size) {
            return ["The number of words are less than {size}", ['size' => $this->size]];
        }

        return false;
    }

}