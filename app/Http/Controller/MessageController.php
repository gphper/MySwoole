<?php
namespace app\Http\Controller;

class MessageController{

    public function getMessage(){
        $username = request("username","cuijiapeng");
        $data = [
            "username" => $username,
            "age" => 19
        ];

        return response_json($data);
    }

}