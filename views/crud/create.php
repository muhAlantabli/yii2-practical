<?php


?>


<h1>Create Post</h1>
<?php $form = \yii\widgets\ActiveForm::begin(['id' => 'post-create']); ?>
<?= $form->errorSummary($model) ?>

<?= $form->field($model, 'title')->textInput() ?>
<?= $form->field($model, 'content')->textarea() ?>

<?= \yii\helpers\Html::submitButton('Create', ['class' => 'btn btn-primary']) ?>

<?php \yii\widgets\ActiveForm::end(); ?>
