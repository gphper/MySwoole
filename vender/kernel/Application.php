<?php
/**
 * Created by PhpStorm.
 * User: cuijiapeng
 * Date: 2020/8/23
 * Time: 15:47
 */

namespace vender\kernel;

use vender\container\Container;

class Application
{
    private $response;
    private $request;

    public function __construct()
    {
        $container = Container::getInstance();
        $this->response = $container->make("\\vender\\contract\\ResponseInterface");
        $this->request = $container->make("\\vender\\contract\\RequestInterface");
    }

    public function run(){
        $kernel = new Kernel();
        $kernel->process($this->request, $this->response);
    }
}