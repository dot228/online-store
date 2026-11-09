<?php

namespace controllers;

use core\Controller;
use models\Product;
use core\Core;
use models\User;
class ProductController extends Controller
{
    public function indexAction()
    {
        $products = Product::getAll();
        return $this->render('views/product/list.php', ['products' => $products]);
    }
    public function AddAction()
    {
        $user = User::GetCurrentUser();


        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $brand = $_POST['brand'];
            $price = $_POST['price'];
            $description = $_POST['description'];
            $features = $_POST['features'];
            $imagePath = '/uploads/' . basename($_FILES['image']['name']);

            move_uploaded_file($_FILES['image']['tmp_name'], __DIR__ . '/../uploads/' . basename($_FILES['image']['name']));
            Product::AddProduct($name,$brand,$price, $description ,$features, $imagePath);
            return $this->render();
        } else {
            return $this->render();
        }
    }



    public function detailsAction()
    {
        if (isset($_GET['id'])) {
            $productId = $_GET['id'];
            $productModel = new Product();
            $product = $productModel->getById($productId);

            if ($product) {
                return $this->render('views/product/details.php', ['product' => $product[0]]);
            } else {
                header('Location: /main/index');
                exit();
            }
        } else {
            header('Location: /main/index');
            exit();
        }
    }
}
?>
