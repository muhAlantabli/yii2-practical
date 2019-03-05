<?php
/**
 * Created by PhpStorm.
 * User: muhAlantabli
 * Date: 3/6/19
 * Time: 12:18 AM
 */

namespace app\cart\storage;


interface StorageInterface
{
    /**
     * @return array of cart items
     */
    public function load();

    /**
     * @param array $items from cart
     */
    public function save(array $items);
}