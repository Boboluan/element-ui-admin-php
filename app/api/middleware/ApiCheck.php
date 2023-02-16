<?php
declare (strict_types = 1);

namespace app\api\middleware;

use app\common\Service\TokenService as token;

class ApiCheck
{
    /**
     * 处理请求
     *
     * @param \think\Request $request
     * @param \Closure       $next
     * @return
     */
    public function handle($request, \Closure $next)
    {
//        dump($request->header());die();
        if (empty($request->header('token'))) {
            return  ApiDataReturn(DataReturn('请先登录',40001,[]));
        }
        //验证以及刷新token
        if(token::validateToken($request->header('token'))['code'] == 40001){
            if(token::validateToken($request->header('retoken'))['code'] == 40001){
                return  ApiDataReturn(DataReturn('token過期請重新登陸',40002,[]));
            }else{
                //执行验证以及刷新
                //重置refresh_token
                $uid = token::validateToken($request->header('retoken'))['data'];
                $request->headers->set('token',token::createToken($uid));
                $request->headers->set('retoken',token::createrefreshToken($uid));
            }
        }
        return $next($request);
    }



}
