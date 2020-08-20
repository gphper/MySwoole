<?php
namespace vender\kernel;

use vender\router\Router;

class Kernel{

    public function process($request,$response){
        //获取控制器的类和方法
        $request_uri = $request->server['request_uri'];
        $method = $request->server['request_method'];
        try{
            $controller = Router::getRoute($request_uri,$method);
        }catch (\Exception $e){
            $response->status(404);
            $response->end("<p>".$e->getMessage()."</p>");
            return;
        }
        list($controller,$action) = explode("@",$controller);
        $controller = "app\\Http\\Controller\\".$controller;
        $data = (new $controller)->$action($request,$response);
        $response->end($data);
    }

}