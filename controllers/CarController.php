<?php
/**
 * Created by PhpStorm.
 * User: muhAlantabli
 * Date: 3/11/19
 * Time: 8:19 PM
 */

namespace app\controllers;


use app\models\Car;
use app\models\FamilyCar;
use yii\helpers\Html;
use yii\web\Controller;

class CarController extends Controller
{
    public function actionIndex()
    {
        echo Html::tag('h1', 'All Cars');

        $cars = Car::find()->all();
        foreach ($cars as $car) {
            // Let's know each car name and class
            echo get_class($car) . ' ' . $car->name . "<br />";
        }

        echo Html::tag('h1', 'Family Cars');

        $cars = FamilyCar::find()->all();
        foreach ($cars as $car) {
            // Let's know each family car
            echo get_class($car) . ' ' . $car->name . "<br />";
        }
    }

}