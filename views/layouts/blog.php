<?php $this->beginContent('@app/views/layouts/main.php') ?>
<div class="container">
        <div class="col-xs-8">
            <?= $content ?>
        </div>

        <div class="col-xs-2">
            <div class="sidebar tags">
                <ul>
                    <li><a href='#php'>PHP</a></li>
                    <li><a href='#yii'>Yii</a></li>
                </ul>
            </div>
        </div>
        <div class="col-xs-2">
            <div class="sidebar links">
                <ul>
                    <li><a href='https://www.yiiframework.com'>Yii Framework</a></li>
                    <li><a href='http://www.php.net'>PHP</a></li>
                </ul>
            </div>
        </div>
</div>
<?php $this->endContent() ?>