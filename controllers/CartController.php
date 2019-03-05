<?php
/**
 * Created by PhpStorm.
 * User: muhAlantabli
 * Date: 3/6/19
 * Time: 12:42 AM
 */

namespace app\controllers;

use app\cart\ShoppingCart;
use yii\data\ArrayDataProvider;
use yii\filters\VerbFilter;
use yii\web\Controller;
use app\models\CartAddForm;

class CartController extends Controller
{
    private $_cart;

    public function __construct($id, $module, $config = [], ShoppingCart $cart)
    {
        $this->_cart = $cart;
        parent::__construct($id, $module, $config);
    }

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $dataProvider = new ArrayDataProvider([
            'allModels' => $this->_cart->getItems(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionAdd()
    {
        $model = new CartAddForm();

        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
            $this->_cart->add($model->productId, $model->amount);
            return $this->redirect('index');
        }

        return $this->render('add', [
            'model' => $model,
        ]);
    }


    public function actionDelete($id)
    {
        $this->_cart->remove($id);
        return $this->redirect('index');
    }

}