<?php

namespace app\admin\controller;

use app\common\Service\TokenService as token;

class ApiTest extends Common
{

    public function query()
    {
        $uid =1;
        $token = token::createToken($uid);
        return $token;
    }


    public function query2()
    {
        $uid =1;
        $token = token::createrefreshToken($uid);
        return $token;
    }


    public function test()
    {
        return '111';
    }

}
