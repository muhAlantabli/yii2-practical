<?php
/**
 * Created by PhpStorm.
 * User: muhAlantabli
 * Date: 3/11/19
 * Time: 4:35 PM
 */

namespace app\controllers;


use app\models\Account;
use yii\db\Exception;
use yii\helpers\Html;
use yii\helpers\VarDumper;
use yii\web\Controller;

class AccountController extends Controller
{
    public function actionSuccess()
    {
        $transaction = \Yii::$app->db->beginTransaction();
        try {
            $receiver = Account::findOne(1);
            $sender = Account::findOne(3);

            $transferAmount = 1000;
            $receiver->balance += $transferAmount;
            $sender->balance -= $transferAmount;

            if ($receiver->save() && $sender->save()) {
                $transaction->commit();
                return $this->renderContent(Html::tag('h1', 'Money transfer was successfull!'));
            } else {
                throw new Exception('Money transfer failed!');
            }
        } catch (\Exception $e) {
            $transaction->rollBack();
            throw $e;
        }
    }

}