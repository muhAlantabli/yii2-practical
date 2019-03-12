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
    public $message = "The number of words are less than {size}";
    /**
     * Validate the given string has words less than given number
     * @param string $value
     * @return array|bool
     */
    public function validateValue($value)
    {
        if (str_word_count($value) > $this->size) {
            return [$this->message, ['size' => $this->size]];
        }

        return false;
    }

    /**
     * Check length of input value and compare it to $size
     * and return result to client-side
     * @param \yii\base\Model $model
     * @param string $attribute
     * @param \yii\web\View $view
     * @return string|null
     */
    public function clientValidateAttribute($model, $attribute, $view)
    {
        $message = strtr($this->message, ['{size}' => $this->size]);
        return "            if (value.split(/\\w+/gi).length > $this->size ) {
                messages.push(\"$message\");
            }";
    }

}