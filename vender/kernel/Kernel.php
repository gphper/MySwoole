<?php

namespace vender\kernel;

use vender\http\Request;
use vender\http\Response;
use vender\middleware\AfterMiddleHandle;
use vender\router\Router;
use vender\middleware\BeforeMiddleHandle;

class Kernel
{

    public function process(Request $request, Response $response)
    {
        //调用前置中间件
        $middle = new BeforeMiddleHandle();
        $middle->dispatch($request);

        //获取控制器的类和方法
        $request_uri = $request->server['request_uri'];
        $method = $request->server['request_method'];
        $controller = Router::getRoute($request_uri, $method);
        list($controller, $action) = explode("@", $controller);
        $controller = "app\\Http\\Controller\\" . $controller;
        $data = (new $controller)->$action($request, $response);

        //调用后置中间件
        $middle = new AfterMiddleHandle();
        $middle->dispatch($response);

        $response->send($data);
    }

}