<?php
/**
 * Created by PhpStorm.
 * User: muhAlantabli
 * Date: 3/10/19
 * Time: 4:26 PM
 */

namespace app\controllers;


use app\models\Actor;
use yii\db\Query;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\Controller;

class DbController extends Controller
{
    /**
     * ActiveRecord Usage
     * @return string
     */
    public function actionAr()
    {
        $records = Actor::find()->joinWith('films')
            ->orderBy('actor.first_name, actor.last_name, film.title')
            ->all();

        return $this->renderRecords($records);
    }

    /**
     * ActiveQuery Usage
     * @return string
     */
    public function actionActiveQuery()
    {
        $rows = (new Query())->from('actor')->innerJoin('film_actor', 'actor.actor_id = film_actor.actor_id')
            ->leftJoin('film', 'film_actor.film_id = film.film_id')
            ->orderBy('actor.first_name, actor.last_name, film.title')
            ->all();

        return $this->renderRows($rows);
    }

    /**
     * DAO Usage
     * @return string
     */
    public function actionDao()
    {
        $sql = 'SELECT *
                FROM actor a
                JOIN film_actor fa ON a.actor_id = fa.actor_id
                JOIN film f ON fa.film_id = f.film_id
                ORDER BY a.first_name, a.last_name, f.title
                ';

        $rows = \Yii::$app->db->createCommand($sql)->queryAll();
        return $this->renderRows($rows);
    }

    /**
     * Render records of Active Record array
     * @param array $records
     * @return string
     */
    public function renderRecords(array $records)
    {
        if (!$records) {
            return $this->renderContent('Actor list is empty');
        }

        $items = [];
        foreach ($records as $record) {
            $actorFilms = $record->films ? Html::ol(ArrayHelper::getColumn($record->films, 'title')) : null;
            $actorName = $record->first_name . ' ' . $record->last_name;
            $items [] = $actorName . $actorFilms;
        }

        return $this->renderContent(Html::ol($items, ['encode' => false]));
    }

    /**
     * Render rows of Active Query of DAO
     * @param array $rows
     * @return string
     */
    public function renderRows(array $rows)
    {
        if (!$rows) {
            return $this->renderContent('Actor list is empty');
        }

        $items = [];
        $films = [];
        $actorName = null;

        $lastActorId = $rows[0]['actor_id'];
        foreach ($rows as $row) {
            $actorId = $row['actor_id'];

            if ($actorId != $lastActorId) {
                $actorFilms = $films ? Html::ol($films) : null;
                $items[] = $actorName . $actorFilms;

                $films = [];
                $actorName = null;
                $lastActorId = $actorId;
            }

            $films[] = $row['title'];
            if (!isset($actorName)) {
                $actorName = $row['first_name'] . ' ' . $row['last_name'];
            }
        }

        if ($actorId == $lastActorId) {
            $actorFilms = $films ? Html::ol($films) : null;
            $items[] = $actorName . $actorFilms;
        }
        return $this->renderContent(Html::ol($items, ['encode' => false,]));
    }
}