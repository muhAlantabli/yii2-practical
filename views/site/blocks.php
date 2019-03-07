<?php

use \yii\helpers\Html;

$this->beginBlock('content');
    echo Html::tag('pre', 'Your IP is ' . \Yii::$app->request->userIP);
$this->endBlock();

?>

