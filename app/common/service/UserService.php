<?php

namespace app\common\service;



class UserService extends BaseService
{

    protected $User;

    public function __construct()
    {
        parent::__construct();
        $this->User = new \app\common\models\AdminModel();
    }


    /**
     * @param $params
     * Author : Hyy
     * Since  : 2023/2/24 10:31
     * Description : 用户登录
     * @return array
     */
    public  function UserLoginService($params)
    {
        return  $this->checkUser($params);
    }



    /**
     * @param $params
     * Author : Hyy
     * Since  : 2023/2/24 10:29
     * Description : 检查用户信息
     * @return array
     */
    public function  checkUser($params)
    {
        $User = $this->User->get(['username'=>$params['username']],'password','','find');
        if(empty($User)){
            return renderError('该用户不存在');
        }else{
            if(!password_verify($params['password'],$User['password'])){
                return renderError('密码错误');
            }
        }
        $Return['token'] = TokenService::createToken();
        $Return['userInfo'] = $User;
        return renderSuccess($Return);
    }


    /**
     * @param $user_id
     * Author : Hyy
     * Since  : 2023/2/24 10:30
     * Description : 查询用户信息
     * @return array
     */
    public function UserInfoService($user_id)
    {
        return $this->User->get(['id'=>$user_id],'password','','find');
    }


}
