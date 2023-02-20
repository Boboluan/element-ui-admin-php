<?php

namespace app\admin\controller;

use think\App;

class User extends Common implements \app\apiInterfaceFile\User
{

    protected $userService;


    public function __construct(App $app)
    {
        parent::__construct($app);

        $this->userService = new \app\common\service\UserService();
    }


    public function UserInfo()
    {
//        dump($this->userService->UserInfoService(1));
//        dump(11);die();
        return renderData($this->userService->UserInfoService(1));
    }


    public function UserLogin()
    {
        return renderData($this->userService->UserLoginService($this->request->post()));
    }


    public function UserLogout()
    {
        // TODO: Implement UserLogout() method.
    }

}
