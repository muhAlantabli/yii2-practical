<?php
/**
 * Created by PhpStorm.
 * User: muhAlantabli
 * Date: 3/11/19
 * Time: 11:30 PM
 */

namespace app\controllers;


use app\models\ArticleModel;
use yii\helpers\Html;
use yii\web\Controller;

class ModelValidatorController extends Controller
{

    /**
     * @return string
     */
    protected function getLongTitle()
    {
        return 'Suspendisse enim turpis, dictum sed, iaculis a, condimentum nec, nisi. Donec venenatis vulputate lorem. Morbi mollis tellus ac sapien. Curabitur turpis. Praesent metus tellus, elementum eu, semper a, adipiscing nec, purus. ' .
            'Praesent congue erat at massa. Ut varius tincidunt libero. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum.' .
            ' Cras ultricies mi eu turpis hendrerit fringilla. Donec sodales sagittis magna.';
    }

    /**
     * @return string
     */
    public function getShortTitle()
    {
        return 'Praesent egestas neque eu enim.';
    }

    /**
     * Validation success
     */
    public function actionSuccess()
    {
        $title = $this->getShortTitle();
        return $this->renderContentByModel($title);
    }

    /**
     * Validation fail
     */
    public function actionFail()
    {
        $title = $this->getLongTitle();
        return $this->renderContentByModel($title);
    }

    /**
     * @param $title
     * @return string
     */
    public function renderContentByModel($title)
    {
        $model = new ArticleModel();
        $model->title = $title;

        if ($model->validate()) {
            $content = Html::tag('div', 'Model is valid', ['class' => 'alert alert-success']);
        } else {
            $content = Html::errorSummary($model, ['class' => 'alert alert-danger']);
        }

        return $this->renderContent($content);

    }


}