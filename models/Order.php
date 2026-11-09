<?php
namespace models;

use core\Core;
class Order
{
    static protected $tableName = "orders";

    public static function getAll()
    {
        $db = Core::getInstance()->db;
        return $db->SelectValuesAt('orders');
    }
    public static function getById($id)
    {
        $db = Core::getInstance()->db;
        return $db->SelectValuesAt('orders', '*', ['id' => $id]);

    }

    public static function AddOrder($product_id, $user_id, $quantity)
    {

        \core\Core::getInstance()->db->insert(
            self::$tableName, [
                'product_id' => $product_id,
                'user_id' => $user_id,
                'quantity' => $quantity
            ]
        );
    }
}