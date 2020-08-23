<?php
/**
 * Created by PhpStorm.
 * User: hengda
 * Date: 2020/8/22
 * Time: 11:24
 */

namespace app\Http\Middleware;

use vender\contract\middleware\AfterBaseMiddleware;
use vender\contract\RequestInterface;
use vender\contract\ResponseInterface;

class AfterMiddleware extends AfterBaseMiddleware
{
    public function handle(ResponseInterface $response)
    {
        var_dump("After Middle");

        if($this->next_node){
            $this->next_node->handle($response);
        }
    }
}