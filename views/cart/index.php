<?php


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ArrayDataProvider */

$this->title = 'Cart';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="cart-index">
    <h1><?= \yii\helpers\Html::encode($this->title) ?></h1>

    <p><?= \yii\helpers\Html::a('Add Item', ['add'], ['class' => 'btn btn-success']) ?></p>

    <?= \yii\grid\GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => \yii\grid\SerialColumn::class],
            'id:text:Product ID',
            'amount:text:Amount',

            [
                'class' => \yii\grid\ActionColumn::class,
                'template' => '{delete}',
            ],
        ],
    ]) ?>
</div>
