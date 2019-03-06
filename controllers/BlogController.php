<?php
/**
 * Created by PhpStorm.
 * User: muhAlantabli
 * Date: 3/6/19
 * Time: 10:44 PM
 */

namespace app\controllers;


use yii\web\Controller;

class BlogController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionRssFeed($param)
    {
        return $this->renderContent('This is RSS feed for our blog and ' . $param);
    }

    public function actionArticle($alias)
    {
        return $this->renderContent('This is article with alias ' . $alias);
    }

    public function actionList()
    {
        return $this->renderContent('Blog\'s articles here');
    }

    public function actionHiTech()
    {
        return $this->renderContent('Just a test of action which contains more than one words in the name');
    }

}