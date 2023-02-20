<?php

namespace app\admin\controller;

use app\BaseController;
use think\response\Json;

class Common extends BaseController
{

    /**
     * 返回封装后的 API 数据到客户端
     * @param int|null $status 状态码
     * @param string $message
     * @param array $data
     * @return Json
     */
    protected function renderJson(int $status = null, string $message = '', array $data = []): Json
    {
        return json(compact('status', 'message', 'data'));
    }

    /**
     * 返回操作成功json
     * @param array|string $data
     * @param string $message
     * @return Json
     */
    protected function renderSuccess($data = [], string $message = 'success'): Json
    {
        if (is_string($data)) {
            $message = $data;
            $data = [];
        }
        return $this->renderJson(config('status.success'), $message, $data);
    }

    /**
     * 返回操作失败json
     * @param string $message
     * @param array $data
     * @return Json
     */
    protected function renderError(string $message = 'error', array $data = []): Json
    {
        return $this->renderJson(config('status.error'), $message, $data);
    }


    /**
     * 返回操作结果
     * @param string $message
     * @param array $data
     * @return Json
     */
    protected function renderData($data = [])
    {
        return json(compact('data'));
    }



    /**
     * 获取post数据 (数组)
     * @param $key
     * @return mixed
     */
    protected function postData($key = null)
    {
        return $this->request->post(is_null($key) ? '' : $key . '/a');
    }

    /**
     * 获取post数据 (数组)
     * @param string $key
     * @return mixed
     */
    protected function postForm(string $key = 'form')
    {
        return $this->postData($key);
    }



}
