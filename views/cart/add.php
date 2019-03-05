<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\CartAddForm */

$this->params['breadcrumbs'][] = ['label' => 'Cart', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="cart-add">
    <h1><?= \yii\helpers\Html::encode($this->title) ?></h1>

    <?php $form = \yii\bootstrap\ActiveForm::begin(['id' => 'contact-form']); ?>

    <?= $form->field($model, 'productId')->textInput() ?>
    <?= $form->field($model, 'amount')->textInput() ?>

    <div class="form-group">
        <?= \yii\helpers\Html::submitButton('Add', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php \yii\bootstrap\ActiveForm::end() ?>
</div>
