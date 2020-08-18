<?php
namespace vender\kernel;

use ReflectionClass;
use Router;

class Kernel{
    private $route;

    public function __construct()
    {
        $this->route = new Router();
    }

    public function process($request,$response){
        
        //获取控制器的类和方法
        $request_uri = $request->server['request_uri'];
        $controller = $this->route->getRouter($request_uri);
        $controller_arr = explode("@",$controller);

        //使用反射实例化类
        $ref = new ReflectionClass("app\\Http\\Controller\\".$controller_arr[0]);
        $controller_instance = $ref->newInstance();
        call_user_func_array([$controller_instance,$controller_arr[1]],[$request,$response]);

    }

}