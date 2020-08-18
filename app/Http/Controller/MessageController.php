<?php
namespace app\Http\Controller;

class MessageController{

    public function __construct()
    {
        var_dump("实例化message对象");
    }

    public function getMessage($request,$response){
        var_dump(__METHOD__);
        $response->header("Content-Type", "text/html; charset=utf-8");
        $response->end("<h1>Hello Swoole. #".rand(1000, 9999)."</h1>");
    }

}