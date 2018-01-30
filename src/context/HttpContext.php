<?php
/**
 * Created by PhpStorm.
 * User: zxduan
 * Date: 2018/1/29
 * Time: 19:30
 */

namespace phpdo\context;


use phpdo\framework\Context;
use phpdo\http\Request;
use phpdo\http\Response;

class HttpContext extends Context {

    /**
     * @var Request
     */
    protected $req;

    /**
     * @var Response
     */ 
    protected $resp;

    /**
     * 初始化
     * @return void
     */
    public function initialize()
    {
        // TODO: Implement initialize() method.
    }

    /**
     * 获取request
     * @return Request
     */
    public function request() {
        return null;
    }

    /**
     * 获取response
     * @return Response
     */
    public function Response() {
        return null;
    }
}