<?php
/**
 * Created by PhpStorm.
 * User: hengda
 * Date: 2020/8/19
 * Time: 8:38
 */

namespace vender\router;

class Router
{
    private static $get_coll = [];

    public static function __callStatic($name, $arguments)
    {

        //判断方法是否正确
        if (!in_array(strtolower($name), ["post", "get", "put", "delete", "head"])) {
            throw new \Exception("只支持 【post,get,put,delete,head】 请求");
        }

        //判断传入的值是否合法
        if (count($arguments) != 2) {
            throw new \Exception("该方法需要输入两个参数，您输入了" . count($arguments) . "个");
        }

        self::$get_coll[$arguments[0]][$name] = $arguments[1];
    }

    public static function getAll()
    {
        return self::$get_coll;
    }

    public static function getRoute($name, $method)
    {
        $method = strtolower($method);
        if (isset(self::$get_coll[$name])) {
            //判断方法是否一直
            if (isset(self::$get_coll[$name][$method])) {
                return self::$get_coll[$name][$method];
            } else {
                throw new \Exception("method not allow");
            }
        } else {
            throw new \Exception("404 not fond");
        }
    }
}