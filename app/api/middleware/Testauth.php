<?php
declare (strict_types = 1);

namespace app\api\middleware;
use Lcobucci\JWT\Parser;
use Lcobucci\JWT\ValidationData;
use Lcobucci\JWT\Signer\Hmac\Sha256;


class Api
{
    /**
     * 处理请求
     *
     * @param \think\Request $request
     * @param \Closure       $next
     * @return Response
     */
    public function handle($request, \Closure $next)
    {
        
		$header = $request->header();
		
		if(!isset($header['token'])){//没有token的话，进行if里面
			return json(['code'=>440,'msg'=>'request must with token']);
		}	

		$token = $header['token'];
	
		try{
			$token = (new Parser())->parse($token);//token解析,解析成一个对象(切记，如果用户随意改的token会进入catch里面)
		}catch(\Exception $e){
			return json(['code'=>440,'msg'=>'invalid token']);
		}		

		$signer = new Sha256();
		//verify进行合法性验证
		if(!$token->verify($signer,config('shop.API_KEY'))){
			 return json(['code'=>440,'msg'=>'token verify failed']);
		}

		$data = new ValidationData();	//验证token是否在有效期内	
		
		if(!$token->validate($data)){
			$mobile = $token->getClaim('mobile');
			$token = getToken($mobile);
			return json(['code'=>450,'msg'=>'token expired','token'=>$token]);
		}
				
		return $next($request);

    }
}