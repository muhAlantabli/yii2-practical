<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */

// get url of ajax call
$url = \yii\helpers\Url::toRoute(['product/get-sub-categories']);

/**
 * Here we catch option value from $category_id
 * and fetch sub categories of it
 */
$this->registerJs("
$('#product-category_id').on('change', function() {
    $.ajax({
        'url': '" . $url . "?category_id=' + $(this).val() ,
        'dataType': 'json',
        'type': 'GET',
        'success': function(data) {
            var select = $('#product-subcategory');
            var opt = $('<option>');
            opt.val(null);
            opt.text('Select a Sub Category');
            select.children('option').remove();
            select.append(opt);
            
            for (i=0; i < data.length; i++) {
                var opt = $('<option>');
                opt.val(data[i].id);
                opt.text(data[i].title);
                select.append(opt);
            }
        }
    });
});
", \yii\web\View::POS_READY);
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'category_id')->dropDownList(
        \yii\helpers\ArrayHelper::map(\app\models\Category::find()->where('parent_id IS NULL')->all(), 'id', 'title'), [
        'prompt' => 'Select a Category',
    ]) ?>

    <?= $form->field($model, 'subCategory')->dropDownList(
        \yii\helpers\ArrayHelper::map(\app\models\Category::find()->where('parent_id IS NOT NULL')->all(), 'id', 'title'), [
        'prompt' => 'Select a Sub Category'
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
