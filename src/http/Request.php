<?php
/**
 * Created by PhpStorm.
 * User: zxduan
 * Date: 2018/1/29
 * Time: 19:50
 */

namespace phpdo\http;


class Request {

    /**
     * 获取协议
     * @return string
     */
    public function schema() {

    }

    /**
     * 获取host
     * @return string
     */
    public function host() {

    }

    /**
     * 获取请求方法
     * @return string
     */
    public function method() {
        
    }
    /**
     * 获取uri
     * @return string
     */
    public function uri() {

    }

    /**
     * 获取查询参数
     * @return string
     */
    public function query() {
        
    }

    /**
     * 获取制定参数
     * @param $key
     * @param null $default
     * @return mixed
     */
    public function get($key = "", $default = null) {
        
    }

    /**
     * 获取请求头 
     * @return string
     */
    public function header($key) {
        
    }

    /**
     * 获取所有请求头
     * @return array
     */
    public function headers() {
        
    }

    /**
     * 获取cookie
     * @return Cookie
     */
    public function cookie() {
        
    }

    /**
     * 获取指定post参数
     * @param string $key
     * @param null $default
     * @return mixed
     */
    public function post($key = "", $default = null) {

    }

    /**
     * 获取请求体
     * @return string
     */
    public function body() {

    }

    /**
     * 获取服务器器环境变量
     * @return mixed
     */
    public function server($key) {

    }

    /**
     * 获取文件信息
     * @return array
     */
    public function file($name) {

    }


}