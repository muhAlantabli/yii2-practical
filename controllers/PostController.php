<?php

namespace app\controllers;

use yii\filters\AccessControl;
use yii\helpers\Html;
use yii\web\Controller;

class PostController extends Controller
{
    public $pageTitle = 'Posts';
    public function actions()
    {
        return [
            'index' => ['class' => 'app\actions\IndexAction', 'modelClass' => 'app\models\Post'],
            'view' => ['class' => 'app\actions\ViewAction', 'modelClass' => 'app\models\Post'],
            'delete' => ['class' => 'app\actions\DeleteAction', 'modelClass' => 'app\models\Post'],
            'create' => ['class' => 'app\actions\CreateAction', 'modelClass' => 'app\models\Post'],
        ];
    }

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                        'actions' => ['create']
                    ],
                ],
                'denyCallback' => function ($rule, $action) {
                    \Yii::$app->session->setFlash('error', 'This action for authorized people only');
                    return $this->redirect(['index']);
                },
            ],
        ];
    }


//    public function actionView($alias)
//    {
//        return $this->renderContent(Html::tag('h2',
//            'Showing post with alias ' . Html::encode($alias)
//        ));
//    }

//    public function actionIndex($type = 'posts', $order = 'DESC')
//    {
//        return $this->renderContent(Html::tag('h2',
//            'Showing ' . Html::encode($type) . ' ordered ' .
//            Html::encode($order)
//        ));
//    }

    public function actionHello($name)
    {
        return $this->renderContent(Html::tag('h2',
            'Hello, ' . Html::encode($name) . '!'
        ));
    }
}