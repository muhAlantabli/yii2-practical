<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use app\models\User;
use yii\console\Controller;
use yii\console\ExitCode;
use yii\helpers\FileHelper;
use yii\helpers\Inflector;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class HelloController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     * @return int Exit code
     */
    public function actionIndex($message = 'hello world')
    {
        echo $message . "\n";

        return ExitCode::OK;
    }

    public function actionCreateAdmin($password = 'admin')
    {
        try {
            $model = new User();
            $model->first_name = 'MHD';
            $model->last_name = 'Ahmad';
            $model->username = 'admin';
            $model->email = 'admin@example.com';
            $model->setPassword($password);
            $model->generateAuthKey();
            $model->save();
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function actionExchange($currency)
    {
        echo \Yii::$app->exchange->getRate('USD', $currency) . PHP_EOL;
        return ExitCode::OK;
    }
}
