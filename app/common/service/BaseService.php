<?php

namespace app\common\service;

use think\cache\driver\Redis;

class BaseService
{
    //实例化redis
    protected $redis;

    public function __construct()
    {
        $this->redis = new Redis();
    }
}