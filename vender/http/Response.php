<?php
/**
 * Created by PhpStorm.
 * User: hengda
 * Date: 2020/8/22
 * Time: 13:26
 */

namespace vender\http;


use vender\contract\ResponseInterface;

class Response implements ResponseInterface
{
    protected $response;

    public function __construct(\Swoole\Http\Response $response)
    {
        $this->response = $response;
    }

    public function setHeader(string $key,string $value){
        $this->response->header($key,$value);
    }

    public function send(string $data){
        $this->response->end($data);
    }
}