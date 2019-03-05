<?php
/**
 * Created by PhpStorm.
 * User: muhAlantabli
 * Date: 3/6/19
 * Time: 12:21 AM
 */

namespace app\cart\storage;

use yii\web\Session;

class SessionStorage implements StorageInterface
{
    private $_session;
    private $_key;

    public function __construct(Session $session, $key)
    {
        $this->_key = $key;
        $this->_session = $session;
    }

    public function load()
    {
        return $this->_session->get($this->_key, []);
    }

    public function save(array $items)
    {
        $this->_session->set($this->_key, $items);
    }


}