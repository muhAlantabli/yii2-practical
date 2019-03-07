<?php
/**
 * Created by PhpStorm.
 * User: muhAlantabli
 * Date: 3/7/19
 * Time: 4:56 AM
 */

namespace app\actions;


use yii\base\Action;
use yii\data\Pagination;

class IndexAction extends Action
{
    public $modelClass;
    public $pageSize = 3;

    public function run()
    {
        $class = $this->modelClass;
        $query = $class::find();
        $countQuery = clone $query;

        $pages = new Pagination([
            'totalCount' => $countQuery->count(),
        ]);

        $pages->setPageSize($this->pageSize);

        $models = $query->offset($pages->offset)->limit($pages->limit)->all();

        return $this->controller->render('//crud/index', [
            'models' => $models,
            'pages' => $pages
        ]);
    }

}