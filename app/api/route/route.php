<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
namespace app\api\route;

use think\facade\Route;

//路由访问 http://laytp6.net/index.php/think
//api路由 测试用例
Route::group('apis',function ()
{
    //访问走中间件测试
    Route::any('test', 'apitest/test');

})->middleware(\app\api\middleware\Test::class);




//不需要中间件
Route::group('not',function ()
{
    Route::any('fund', 'apitest/test2');
    Route::any('query', 'apitest/query');
});
