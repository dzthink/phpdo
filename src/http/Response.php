<?php
/**
 * Created by PhpStorm.
 * User: zxduan
 * Date: 2018/1/29
 * Time: 19:50
 */

namespace phpdo\http;

use \Symfony\Component\HttpFoundation\Response as SymfonyResponse;

class Response extends SymfonyResponse {

    /**
     * 设置http返回码和信息
     * @param int $code http返回码
     * @param string $msg http返回信息
     * @return self
     */
    public function status($code, $msg) {
        $this->setStatusCode($code, $msg);
        return $this;
    }


    /**
     * 设置header
     * @param string $name 响应头名称
     * @param string $value 响应头信息
     * @return self
     */

    public function header($name, $value) {
        $this->headers->set($name, $value);
        return $this;
    }


    /**
     * 批量设置header
     * @param array $headers
     * @return self
     */
    public function headers($headers) {
        foreach($headers as $k => $v) {
            $this->headers->set($k, $v);
        }
        return $this;
    }

    /**
     * 移除header
     * @param string $name 头信息名称
     */
    public function removeHeader($name) {
        $this->headers->remove($name);
        return $this;
    }

    /**
     * 设置cookie
     * @param Cookie $cookie cookie对象
     * @return self
     */
    public function cookie() {
        return $this;
    }

    /**
     * 获取cookie对象
     * @return array
     */
    public function getCookie() {
        return $this->headers->getCookies();
    }

    /**
     * 设置body数据
     * @param string $body 数据
     * @return self;
     */
    public function body($body) {
        $this->setContent($body);
    }
}