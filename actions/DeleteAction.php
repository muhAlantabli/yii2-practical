<?php
/**
 * Created by PhpStorm.
 * User: muhAlantabli
 * Date: 3/7/19
 * Time: 4:52 AM
 */

namespace app\actions;


use yii\base\Action;
use yii\web\NotFoundHttpException;

class DeleteAction extends Action
{
    public $modelClass;

    public function run($id)
    {
        $class = $this->modelClass;

        if (($model = $class::findOne($id)) == null) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        $model->delete();
        return $this->controller->redirect(['index']);
    }

}