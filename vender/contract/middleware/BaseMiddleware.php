<?php
/**
 * Created by PhpStorm.
 * User: hengda
 * Date: 2020/8/22
 * Time: 11:22
 */

namespace vender\contract\middleware;


use vender\contract\RequestInterface;

abstract class BaseMiddleware
{
    protected $next_node = null;
    abstract public function handle(RequestInterface $request);

    public function setNextMiddleware(BaseMiddleware $next){
        $this->next_node = $next;
    }
}