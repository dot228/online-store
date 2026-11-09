<?php

namespace controllers;

use core\Core;
use models\Order;
use core\Controller;
use models\User;

class OrderController extends Controller
{

    public function createAction() {
        if (!isset($_SESSION['user']) || !isset($_SESSION['user']['id'])) {
            header('Location: /user/login');
            exit();
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productId = $_POST['product_id'];
            $quantity = $_POST['quantity'];
            $userId = $_SESSION['user']['id'];

            Order::AddOrder($productId,$userId,$quantity);

            header('Location: /order/confirmation');
        }
    }

    public function confirmationAction() {
        return $this->render('views/order/confirmation.php');
    }
}
