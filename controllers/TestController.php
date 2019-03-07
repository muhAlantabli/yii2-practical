<?php

namespace app\controllers;

use app\components\CustomFilter;
use yii\web\Controller;
use yii\helpers\Html;

class TestController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => CustomFilter::class,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->renderContent(Html::tag('h2', 'Index action'));
    }

    public function actionPage($alias)
    {
        return $this->renderContent(Html::tag('h2', 'Page is ' . Html::encode($alias)));
    }

    public function actionUrls()
    {
        return $this->render('urls');
    }
}
