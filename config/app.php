<?php
return [

    "middlewares" => [
        "before" => [
            "app\Http\Middleware\BeforeMiddleware",
            "app\Http\Middleware\NextMiddleware"
        ],
        "after" => [
            "app\Http\Middleware\AfterMiddleware"
        ]
    ]
];