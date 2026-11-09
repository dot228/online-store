<?php

namespace models;

use core\Core;
use core\DB;

class User
{
    protected static  $tableName = "User";
    public static function register($login, $password, $firstname, $lastname, $role)
    {
        \core\Core::getInstance()->db->insert(
            self::$tableName, [
                'login' => $login,
                'password' => $password,
                'firstname' => $firstname,
                'lastname' => $lastname,
                'role' => $role
            ]
        );
    }

    public function AuthenticateUser($userRow)
    {
        $login = $userRow['login'];
        $password = $userRow['password'];

        $db = Core::getInstance()->db;
        $users = $db->Run(
            $db->SELECT_FROM("User").
            $db->WHERE("login = '{$login}' AND password = '{$password}'")
        );

        if(count($users) > 0)
            return $users[0];
        else
            return false;
    }

    public static function IsUserAdmin()
    {
        $currentUser = self::GetCurrentUser();
        return $currentUser && $currentUser['role'] == 1;
    }

    public static function IsUserAuthenticated()
    {
        return isset($_SESSION['user']);
    }
    public  static function GetCurrentUser()
    {
        if(self::IsUserAuthenticated())
        {
            $user = $_SESSION['user'];
            $user = self::GetUserByID($user['id']);
            return $user;
        }

        else return null;
    }

    public static function GetUserByID($ID, $fields = null)
    {
        $db = Core::getInstance()->db;
        if($fields==null)
            $fields = "*";

        $query = $db->SELECT_FROM("User", $fields).$db->WHERE("id = '{$ID}'");
        $result = $db->Run($query);

        if(count($result) > 0)
            return $result[0];
        return null;
    }
}
?>
