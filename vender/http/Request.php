<?php
/**
 * Created by PhpStorm.
 * User: hengda
 * Date: 2020/8/22
 * Time: 11:57
 */

namespace vender\http;

use vender\contract\RequestInterface;

class Request implements RequestInterface
{
    protected $request;

    public function __construct(\Swoole\Http\Request $request)
    {
        $this->request = $request;
    }

    public function __call($name, $arguments)
    {
        return $this->request->$name($arguments);
    }

    public function __get($name)
    {
        return $this->request->$name;
    }
}