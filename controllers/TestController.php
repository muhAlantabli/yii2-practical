<?php

namespace app\controllers;

use yii\web\Controller;
use yii\helpers\Html;

class TestController extends Controller
{
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
