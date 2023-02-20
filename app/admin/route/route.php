<?php

namespace app\api\route;

use app\admin\middleware\UserLogin;
use think\facade\Route;

//路由访问 http://192.168.60.1:8060/admin.php/user/login
//api路由 测试用例
Route::group('user',function ()
{
    Route::any('info', 'admin/user/UserInfo');
});



Route::group('login',function ()
{
    //登录
    Route::any('login', 'admin/user/userlogin');
})->middleware(UserLogin::class);
