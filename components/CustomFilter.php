<?php
/**
 * Created by PhpStorm.
 * User: muhAlantabli
 * Date: 3/7/19
 * Time: 11:47 AM
 */

namespace app\components;


use yii\base\ActionFilter;
use yii\web\HttpException;

class CustomFilter extends ActionFilter
{
    CONST WORK_TIME_BEGIN = 10;
    const WORK_TIME_END = 18;

    protected function canBeDisplay()
    {
        $hours = date('G');
        return $hours >= self::WORK_TIME_BEGIN && $hours <= self::WORK_TIME_END;
    }

    public function beforeAction($action)
    {
        if (!$this->canBeDisplay()) {
            $error = 'This part of website works from ' . self::WORK_TIME_BEGIN . ' to ' . self::WORK_TIME_END;
            throw new HttpException(403, $error);
        }

        return parent::beforeAction($action);
    }

    public function afterAction($action, $result)
    {
        if (\Yii::$app->request->url == '/test/index') {
            \Yii::debug('This is index action');
        }

        return parent::afterAction($action, $result);
    }

}