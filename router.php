<?php

/** 
 *路由类 
 * 
*/
class Router{
    private $router = [
        "/message" => "MessageController@getMessage",
    ];

    public function getRouter($routeName){
        if(isset($this->router[$routeName])){
            return $this->router[$routeName];
        }else{
            return "not found 404";
        }

    }
}