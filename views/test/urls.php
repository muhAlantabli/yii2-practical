<?php

use yii\helpers\Url;
use yii\helpers\Html;

?>

<h1>Generating Urls</h1>

<h3>Generating a link with URL to <i>blog</i> controller and <i>article</i> action with alias as param</h3>

<?= Html::a('Link Name', ['blog/article', 'alias' => 'SomeAlias']); ?>

<h3>Current Url</h3>
<?= Url::to('') ?>

<h3>Current Controller, but you can specify an action</h3>
<?= Url::toRoute(['view', 'id' => 'contact']) ?>

<h3>Current module, but you can specify controller and action</h3>
<?= Url::toRoute('blog/article') ?>

<h3>Canonical Url</h3>
<?= Url::canonical() ?>

<h3>Getting home url</h3>
<?= Url::home() ?>

<h3>Save current url, and getting it for reuse</h3>
<?php Url::remember() ?>
<?= Url::previous() ?>

<h3>Creating URL to <i>blog</i> controller and <i>rss-feed</i>
    action while URL helper isn't available</h3>
<?= Yii::$app->urlManager->createUrl(['blog/rss-feed', 'param' => 'someParam']) ?>

<h3>Creating an absolute URL to <i>blog</i> controller and
    <i>rss-feed</i></h3>
<p>It's very useful for emails and console applications</p>
<?= Yii::$app->urlManager->createAbsoluteUrl(['blog/rss-feed', 'param' => 'someParam']) ?>
