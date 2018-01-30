<?php
/**
 * Created by PhpStorm.
 * User: zxduan
 * Date: 2018/1/29
 * Time: 19:50
 */

namespace phpdo\http;


use Symfony\Component\HttpFoundation\Request as SymfonyHttpRequest;

class Request extends SymfonyHttpRequest {
    /**
     * 获取制定参数
     * @param $key
     * @param null $default
     * @return mixed
     */
    public function get($key = "", $default = null) {
        $this->query->get($key, $default);
    }

    /**
     * 获取cookie
     * @return Cookie
     */
    public function cookie($key, $default = null) {
        $this->cookies->get($key, $default);
    }

    /**
     * 获取指定post参数
     * @param string $key
     * @param null $default
     * @return mixed
     */
    public function post($key = "", $default = null) {
        $this->request->get($key, $default);
    }

    /**
     * 获取请求体
     * @return string
     */
    public function body() {
        $this->getContent();
    }

}