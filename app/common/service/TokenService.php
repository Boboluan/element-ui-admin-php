<?php

namespace app\common\service;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class TokenService
{

    /**
     * @param $uid
     * @return string
     * 生成token
     */
    public static function createJwtToken($uid)
    {
        $key = config('app')['JwtKey'];
        $time = time();
        $payload = array(
            "iss" => "",
            "aud" => "",
            "iat" => $time,
            "nbf" => $time,
            "exp" => $time+86400,
            "uid" => $uid
        );
        return JWT::encode($payload,$key,"HS256");
    }




    /**
     * @param $token
     * @return
     * 验证token
     */
    public static function validateToken($token)
    {
        $key = config('app')['JwtKey'];
        try {
            $decoded = JWT::decode($token, new Key($key,"HS256"));
            return DataReturn('token验证成功',200,$decoded->uid);
        }catch (\Exception $e){
            return DataReturn('token过期',40001,[]);
        }
    }




    /**
     * @param $uid
     * @return string
     * 生成刷新验证token
     */
    public static function createrefreshToken($uid)
    {
        $key = config('app')['JwtKey'];
        $time = time();
        $payload = array(
            "iss" => "",
            "aud" => "",
            "iat" => $time,
            "nbf" => $time,
            "exp" => $time+3*86400,
            "uid" => $uid
        );
        return JWT::encode($payload,$key,"HS256");
    }



    /**
     * @param string $salt
     * @return string
     * 创建生成token
     */
    public static function createToken(string $salt='tp6'): string
    {
        $str=md5(uniqid(md5(microtime(true)),true));
        return sha1($str.$salt);
    }


}
