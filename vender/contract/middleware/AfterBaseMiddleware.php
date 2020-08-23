<?php
/**
 * Created by PhpStorm.
 * User: hengda
 * Date: 2020/8/22
 * Time: 11:22
 */

namespace vender\contract\middleware;

use vender\contract\ResponseInterface;

abstract class AfterBaseMiddleware
{
    protected $next_node = null;
    abstract public function handle(ResponseInterface $response);

    public function setNextMiddleware(AfterBaseMiddleware $next){
        $this->next_node = $next;
    }
}