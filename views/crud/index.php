<?php

use yii\widgets\LinkPager;
use yii\helpers\Html;
use yii\helpers\Url;

?>

<h1>Posts</h1>
<?= Html::a('Create Post', ['create'], ['class' => 'btn btn-success']) ?>

<?php foreach($models as $model) : ?>
<?= Html::encode($model->title) ?>
<?= Html::encode($model->content) ?>

<p>
    <?= Html::a('view', ['view', 'id' => $model->id]) ?>
    <?= Html::a('delete', ['delete', 'id' => $model->id]) ?>
</p>

<?php endforeach; ?>

<?= LinkPager::widget([
    'pagination' => $pages,
]) ?>

