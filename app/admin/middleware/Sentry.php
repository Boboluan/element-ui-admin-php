<?php

namespace app\admin\middleware;

use app\common\service\TokenService;

class Sentry
{
    public function handle($request, \Closure $next): object
    {
        $header = $request->header();
        $token = $header['authorization'];
        //验证令牌
        if(TokenService::validateToken($token)!==true){
            return  renderData(TokenService::validateToken($token));
        }
        return $next($request);
    }
}
