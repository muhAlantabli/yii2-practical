<?php
/**
 * Created by PhpStorm.
 * User: muhAlantabli
 * Date: 3/12/19
 * Time: 2:55 AM
 */

?>

<h1>Range Form</h1>
<?= \yii\helpers\Html::errorSummary($model, ['class' => 'alert alert-danger']); ?>
<?php $form = \yii\bootstrap\ActiveForm::begin([
    'options' => [
        'class' => 'form-inline'
    ],
]); ?>

<div class="form-group">
    <?= \app\components\RangeInputWidget::widget([
    'model' => $model,
    'from' => 'from',
    'to' => 'to',
    'htmlOptions' => ['class' => 'form-control'],
]) ?>
</div>

<?= \yii\helpers\Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-from']) ?>
<?php \yii\bootstrap\ActiveForm::end(); ?>