<?php
/**
 * Created by PhpStorm.
 * User: hengda
 * Date: 2020/8/22
 * Time: 11:32
 */

namespace vender\middleware;


use vender\contract\RequestInterface;

class MiddleHandle
{

    private $middlewares = [
        "app\Http\Middleware\BeforeMiddleware",
        "app\Http\Middleware\NextMiddleware",
        "app\Http\Middleware\AfterMiddleware"
    ];

    private $first_obj;

    public function __construct()
    {
        $pre_obj = null;
        $next_obj = null;
        foreach ($this->middlewares as $v){
            if(!$pre_obj){
                $pre_obj = new $v;
                $this->first_obj = $pre_obj;
            }else{
                $next_obj = new $v;
                $pre_obj->setNextMiddleware($next_obj);
                $pre_obj = $next_obj;
            }
        }
    }

    public function dispatch(RequestInterface $request)
    {
        $this->first_obj->handle($request);
    }

}