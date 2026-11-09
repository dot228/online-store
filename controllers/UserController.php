<?php

namespace controllers;

use core\Controller;
use models\User;
use core\Core;

class UserController extends Controller
{
    private static string $tableName = 'User';
    public function registerAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $login = $_POST['login'];
            $password = $_POST['password'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $role = 0;

            $errors = $this->validateRegistrationData($login, $password, $firstname, $lastname);

            if (empty($errors)) {
                User::register($login, $password, $firstname, $lastname, $role);
                return $this->render('views/user/login.php');
            } else {
                return $this->render('views/user/register.php', ['errors' => $errors]);
            }
        } else {
            return $this->render('views/user/register.php');
        }
    }



    private function validateRegistrationData($login, $password, $firstname, $lastname)
    {
        $errors = [];

        if (empty($login)) {
            $errors[] = 'Login is required';
        } elseif (!filter_var($login, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Login must be a valid email address';
        }

        if (empty($password)) {
            $errors[] = 'Password is required';
        }

        if (empty($firstname)) {
            $errors[] = 'First name is required';
        }

        if (empty($lastname)) {
            $errors[] = 'Last name is required';
        }
        if ($this->isLoginExists($login)) {
            $errors[] = 'The login already exists. Please choose a different one.';
        }

        return $errors;
    }


    public function loginAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $login = $_POST['login'];
            $password = $_POST['password'];

            $user = new User();
            $authenticatedUser = $user->AuthenticateUser(['login' => $login, 'password' => $password]);

            if ($authenticatedUser) {
                $_SESSION['user'] = $authenticatedUser;
                header('Location: /user/profile');
                exit();
            } else {
                $error = "Invalid login or password";

                return $this->render('views/user/login.php', ['error' => $error]);
            }
        } else {
            return $this->render('views/user/login.php');
        }
    }

    public function logoutAction()
    {
        unset($_SESSION['user']);
        header('Location: /user/login');
    }

    public function profileAction()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: /user/login');
        }

        $user = $_SESSION['user'];
        return $this->render('views/user/profile.php', ['user' => $user]);
    }

    public  function isLoginExists($login): bool
    {
        $db = Core::getInstance()->db;
        $users = $db->Run(
            $db->SELECT_FROM(self::$tableName) .
            $db->WHERE("login = '{$login}'")
        );
        return count($users) > 0;
    }


}
?>
