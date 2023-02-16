<?php

namespace app\admin\middleware;

use think\Exception;

class UserLogin
{

    public function handle($request, \Closure $next)
    {
        $requestData = $request->post();
        try {
            $rule = [
                'username'=>'require',
                'password'=>'require',
            ];
            if (!$result = validate()->check($requestData,$rule)){
                throw new Exception($result);
            }
            return $next($request);

        }catch (Exception $e){
            return  $e->getMessage();
        }
    }


}
