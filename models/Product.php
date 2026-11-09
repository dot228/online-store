<?php

namespace models;

use core\Core;

class Product
{
    static protected $tableName = "products";
    public static function getAll()
    {
        $db = Core::getInstance()->db;
        return $db->SelectValuesAt('products');
    }

    public static function getById($id)
    {
        $db = Core::getInstance()->db;
        return $db->SelectValuesAt('products', '*', ['id' => $id]);
    }
    public function getUniqueBrands() {
        $db = Core::getInstance()->db;
        $result = $db->Run("SELECT DISTINCT brand FROM products");
        return array_column($result, 'brand');
    }

    public function searchProducts($name, $brand) {
        $db = Core::getInstance()->db;
        $query = "SELECT * FROM products WHERE 1=1";
        $params = [];

        if (!empty($name)) {
            $query .= " AND name LIKE ?";
            $params[] = "%" . $name . "%";
        }

        if (!empty($brand)) {
            $query .= " AND brand = ?";
            $params[] = $brand;
        }

        return $db->Run($query, $params);
    }


    public function DeleteProduct($id)
    {
        Core::getInstance()->db->DELETE("products","id = {$id}");
    }
    public static function AddProduct($name,$brand,$price,$description,$feature,$image)
    {

        \core\Core::getInstance()->db->insert(
            self::$tableName, [
                'name' => $name,
                'brand' => $brand,
                'description' => $description,
                'price' => $price,
                'features' => $feature,
                'image' => $image
            ]
        );
    }
    public static function update($id,$name,$brand,$price,$description,$feature,$image) {
        \core\Core::getInstance()->db->UPDATE(self::$tableName, [
            'name' => $name,
            'brand' => $brand,
            'description' => $description,
            'price' => $price,
            'features' => $feature,
            'image' => $image
        ], ['id' => $id]);
    }
}
?>
