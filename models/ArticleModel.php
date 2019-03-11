<?php
/**
 * Created by PhpStorm.
 * User: muhAlantabli
 * Date: 3/11/19
 * Time: 11:27 PM
 */

namespace app\models;


use app\components\WordsValidator;
use yii\base\Model;

class ArticleModel extends Model
{
    public $title;

    /**
     * Here we check for number of words for $title
     * @return array
     */
    public function rules()
    {
        return [
            ['title', 'string'],
            ['title', WordsValidator::className(), 'size' => 10],
        ];
    }

}