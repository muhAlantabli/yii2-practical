<?php
/**
 * Created by PhpStorm.
 * User: muhAlantabli
 * Date: 3/11/19
 * Time: 3:34 PM
 */

namespace app\controllers;


use app\models\BlogPost;
use yii\behaviors\TimestampBehavior;
use yii\helpers\Html;
use yii\helpers\VarDumper;
use yii\web\Controller;

class BlogPostController extends Controller
{

    public function actionIndex()
    {
        $blogPost = new BlogPost();
        $blogPost->title = 'Gotcha!';
        $blogPost->text = 'We need some laughter to ease the tension of holiday shopping.';
        $blogPost->save();

        return $this->renderContent(Html::tag('pre', VarDumper::dumpAsString($blogPost->attributes)));
    }

}