<?php
// [ 应用入口文件 ]

namespace think;
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:GET, POST, OPTIONS, DELETE");
header("Access-Control-Allow-Headers:DNT,X-Mx-ReqToken,Keep-Alive,User-Agent,X-Requested-With,If-Modified-Since,Cache-Control,Content-Type, Accept-Language, Origin, Accept-Encoding,Token");
if (strtoupper($_SERVER['REQUEST_METHOD']) == 'OPTIONS') {
    exit;
}

require __DIR__ . '/../vendor/autoload.php';

$http = (new  App())->http;
$response = $http->name('admin')->run();
$response->send();
$http->end($response);
