<?php
/**
 * Created by PhpStorm.
 * User: muhAlantabli
 * Date: 3/13/19
 * Time: 12:14 AM
 */

namespace app\controllers;


use yii\rest\ActiveController;

class FilmController extends ActiveController
{
    public $modelClass = 'app\models\FilmRest';

    /**
     * format response to xml using content negotiator
     * @return array
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['contentNegotiator']['formats']['application/xml'] = 'xml';
        return $behaviors;
    }

}