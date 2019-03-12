<?php
/**
 * Created by PhpStorm.
 * User: muhAlantabli
 * Date: 3/12/19
 * Time: 3:02 AM
 */

namespace app\controllers;


use app\models\RangeForm;
use yii\web\Controller;

class RangeController extends Controller
{
    public function actionIndex()
    {
        $model = new RangeForm();

        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
            \Yii::$app->session->setFlash('success', 'Form was successfully processed!');
        }

        return $this->render('index', [
            'model' => $model
        ]);
    }

}