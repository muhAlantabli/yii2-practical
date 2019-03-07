<?php
/**
 * Created by PhpStorm.
 * User: muhAlantabli
 * Date: 3/7/19
 * Time: 12:37 AM
 */

namespace app\controllers;


use app\components\BaseController;
use yii\helpers\ArrayHelper;

class TempController extends BaseController
{
    public function actions()
    {
        return ArrayHelper::merge(parent::actions(), [
           'page' => ['class' => 'yii\web\ViewAction', 'defaultView' => 'page', 'viewPrefix' => '']
        ]);
    }

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $rules = $behaviors['access']['rules'];
        $rules = ArrayHelper::merge($rules,[
            [
                'allow' => true,
                'actions' => ['page'],
            ],
        ]);

        $behaviors['access']['rules'] = $rules;
        return $behaviors;
    }

    public function actionIndex()
    {
        return $this->renderContent('index');
    }

}