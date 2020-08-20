<?php
use vender\container\Container;

/**
 * 返回json数据
 */
if(!function_exists("response_json")){
    function response_json($data){
        $response = Container::getInstance()->make("response");
        $response->header("Content-Type", "application/json; charset=utf-8");
        return json_encode($data);
    }
}

if(!function_exists("request")){
    function request($key,$default_value){
        $request = Container::getInstance()->make("request");
        if($request->server["request_method"] == "GET"){
            return isset($request->get[$key])?$request->get[$key]:$default_value;
        }else{
            return isset($request->post[$key])?$request->post[$key]:$default_value;
        }
    }
}