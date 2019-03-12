<?php
/**
 * Created by PhpStorm.
 * User: muhAlantabli
 * Date: 3/13/19
 * Time: 12:14 AM
 */

namespace app\controllers;


use app\models\User;
use yii\filters\auth\HttpBasicAuth;
use yii\helpers\ArrayHelper;
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
        //$behaviors['contentNegotiator']['formats']['application/xml'] = 'xml';

        // Use HTTP Basic Auth
        return ArrayHelper::merge($behaviors, [
            'authenticator' => [
                'class' => HttpBasicAuth::className(),
                'auth' => function ($username, $password) {
                    $user = User::findByUsername($username);
                    if (($user !== null) && $user->validatePassword($password)) {
                        return $user;
                    }
                    return null;
                }
            ]
        ]);
    }

}