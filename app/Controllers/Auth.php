<?php
namespace App\Controllers;
use App\Services\Database;
use App\Services\Router;
session_start();

class Auth{
    public function login($data)
    {
        $db = new Database();
        $sql = "SELECT * FROM `users` WHERE login = :login";
        $params = [
            'login' => $data["login"]
        ];
        $user=$db->query($sql, $params)[0];
        if(!$user) {
            die('user not found');
        }

        if(md5($data["password"].'QxLUF1bgIAdeQX')===$user["password"]){

            $_SESSION["user"]=[
                "id" => $user["idUser"],
                "type" => $user["type"]
            ];
            if(isset($_SESSION["user"])) {
                Router::redirect('/home');
            }
        } else {
            die('Не верные данные');
        }
    }

    public function logout() {
        unset($_SESSION["user"]);
        Router::redirect('/login');
    }
}