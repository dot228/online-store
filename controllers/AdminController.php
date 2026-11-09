<?php

namespace controllers;
use core\Controller;
use models\User;
use models\Order;
use models\Product;

class AdminController extends Controller
{
    public function dashboardAction() {
        if (!User::IsUserAdmin()) {
            header('Location: /main/index');
            exit();
        }

        $productModel = new Product();
        $orderModel = new Order();
        $products = $productModel->getAll();
        $orders = $orderModel->getAll();

        return $this->render('views/admin/dashboard.php', [
            'products' => $products,
            'orders' => $orders
        ]);
    }

    public function editProductAction()
    {
        if (!User::IsUserAdmin()) {
            header('Location: /main/index');
            exit();
        }

        $productModel = new Product();
        $id = isset($_GET['id']) ? intval($_GET['id']) : null;
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $brand = $_POST['brand'];
            $price = $_POST['price'];
            $description = $_POST['description'];
            $features = $_POST['features'];
            $imagePath = '/uploads/' . basename($_FILES['image']['name']);
            move_uploaded_file($_FILES['image']['tmp_name'], __DIR__ . '/../uploads/' . basename($_FILES['image']['name']));
            Product::update($id,$name,$brand,$price, $description ,$features, $imagePath);
        } else {
            $id = $_GET['id'];
            $product = $productModel->getById($id);
            return $this->render(NULL, ['product' => $product]);
        }
    }

    public function editOrderAction() {
        if (!User::IsUserAdmin()) {
            header('Location: /main/index');
            exit();
        }

        $orderModel = new Order();
        $id = isset($_GET['id']) ? intval($_GET['id']) : null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'product_id' => $_POST['product_id'],
                'user_id' => $_POST['user_id'],
                'order_date' => $_POST['order_date'],
                'quantity' => $_POST['quantity']
            ];
            $orderModel->update($id, $data);
            header('Location: /admin/dashboard');
            exit();
        } else {
            $id = $_GET['id'];
            $order = $orderModel->getById($id);
            return $this->render('views/admin/editOrder.php', ['order' => $order]);
        }
    }
    public function deleteProductAction() {
        if (!User::IsUserAdmin()) {
            header('Location: /main/index');
            exit();
        }

        $productModel = new Product();
        $id = $_GET['id'];
        $productModel->DeleteProduct($id);
        header('Location: /admin/dashboard');
        exit();
    }
    public function deleteOrderAction() {
        if (!User::IsUserAdmin()) {
            header('Location: /main/index');
            exit();
        }

        $orderModel = new Order();
        $id = $_GET['id'];
        $orderModel->DeleteOrder($id);
        header('Location: /admin/dashboard');
        exit();
    }
}