<?php
/**
 * Created by PhpStorm.
 * User: muhAlantabli
 * Date: 3/7/19
 * Time: 3:48 AM
 */

namespace app\actions;


use yii\base\Action;

class CreateAction extends Action
{
    public $modelClass;

    public function run()
    {
        $model = new $this->modelClass();

        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            return $this->controller->redirect(['view', 'id' => $model->getPrimaryKey()]);
        }

        return $this->controller->render('//crud/create', [
            'model' => $model
        ]);
    }

}