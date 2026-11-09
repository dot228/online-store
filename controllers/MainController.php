<?php

namespace controllers;

use core\Controller;
use models\Product;

class MainController extends Controller
{
    public function indexAction() {
        $productModel = new Product();

        $brands = $productModel->getUniqueBrands();

        $searchName = isset($_GET['name']) ? $_GET['name'] : '';
        $searchBrand = isset($_GET['brand']) ? $_GET['brand'] : '';

        $products = $productModel->searchProducts($searchName, $searchBrand);

        return $this->render('views/main/index.php', [
            'products' => $products,
            'brands' => $brands
        ]);
    }

    public function errorAction($statusCode)
    {
        http_response_code($statusCode);
        return $this->render('views/main/error.php', ['statusCode' => $statusCode]);
    }
}
?>
