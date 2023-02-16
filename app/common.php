<?php
// 应用公共文件


/**
 * @param string $msg
 * @param int $code
 * @param array $data
 * @return array
 * 公共数据返回
 */
function DataReturn(string $msg, int $code,$data)
{
    $Return = [
        'msg' => $msg,
        'code'=> $code,
        'data'=>$data
    ];
    return $Return;
}



/**
 * @param array $result
 * @return \think\response\Json
 * 公共数据返回api
 */
function ApiDataReturn(array $result)
{
    return json($result);
}


/**
 * 获取token 
 *
 */
function getToken()
{
    $token = request()->header('Authorization');
    return $token;
}