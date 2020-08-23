<?php

use vender\container\Container;

/**
 * 返回json数据
 */
if (!function_exists("response_json")) {
    function response_json($data)
    {
        $response = Container::getInstance()->make("\\vender\\contract\\ResponseInterface");
        $response->setHeader("Content-Type", "application/json; charset=utf-8");
        return json_encode($data);
    }
}

if (!function_exists("request")) {
    function request($key, $default_value)
    {
        $request = Container::getInstance()->make("\\vender\\contract\\RequestInterface");
        if ($request->server["request_method"] == "GET") {
            return isset($request->get[$key]) ? $request->get[$key] : $default_value;
        } else {
            return isset($request->post[$key]) ? $request->post[$key] : $default_value;
        }
    }
}

if (!function_exists("config")) {
    function config($key)
    {
        $key_arr = explode(".", $key);
        $arr = include ROOT_DIR . "/config/" . $key_arr[0] . ".php";
        array_shift($key_arr);
        return array_reduce($key_arr, function ($arr, $key) {
            return $arr[$key];
        }, $arr);
    }
}