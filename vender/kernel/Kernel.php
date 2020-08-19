<?php
namespace vender\kernel;

use ReflectionClass;
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

        $controller_arr = explode("@",$controller);

        //使用反射实例化类
        $ref = new ReflectionClass("app\\Http\\Controller\\".$controller_arr[0]);
        $controller_instance = $ref->newInstance();
        call_user_func_array([$controller_instance,$controller_arr[1]],[$request,$response]);
    }

}