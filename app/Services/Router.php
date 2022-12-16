<?php

namespace App\Services;
use App\Controllers\Auth;
class Router
{
    private static $list = [];

    public static function page($uri, $page_name)
    {
        self::$list[]=[
            "uri" => $uri,
            "page" => $page_name
        ];
    }

    public static function post($uri, $class, $method)
    {
        self::$list[]=[
            "uri" => $uri,
            "class"=>$class,
            "method" => $method,
            "post" => true
        ];
    }

    public static function get($uri, $class, $method, $params=[])
    {
        self::$list[]=[
            "uri" => $uri,
            "class"=>$class,
            "method" => $method,
            "get" => true,
            "params" => $params
        ];
    }

    public static function enable()
    {
       $query = $_GET['q'];
       //перебираем все роуты
       foreach(self::$list as $route) {
        //если существует роут с нашим адресом, то проверяем отправляет ли он данные
        if($route["uri"]==='/'.$query) { 
            if(isset($route["post"]) && $route["post"]===true) {
                $action = new $route["class"];
                $method = $route['method'];
                $action->$method($_POST);
                die();
            } elseif(isset($route["get"]) && $route["get"]===true) {
                $action = new $route["class"];
                $method = $route['method'];
                $action->$method($route["params"]);
                die();
            } else {
                //если роут не отправляет данные, то просто возвращаем страницу
                require_once "views/".$route['page'].".php";
                die();
            }
        }
       }
       self::not_found_page();
    }

    public static function redirect($uri)
    {
        header('Location:'. $uri);
    }

    private static function not_found_page()
    {
        require_once "views/error.php";
    }

}