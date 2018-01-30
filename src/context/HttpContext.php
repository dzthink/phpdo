<?php
/**
 * Created by PhpStorm.
 * User: zxduan
 * Date: 2018/1/29
 * Time: 19:30
 */

namespace phpdo\context;


use phpdo\framework\Context;
use phpdo\framework\IConfig;
use phpdo\framework\IContainer;
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

    public function __construct(IConfig $config, IContainer $container) {
        parent::__construct($config, $container);
        $this->req = new Request();
        $this->resp = new Response();
    }

    /**
     * 初始化
     * @return void
     */
    public function initialize() {

    }

    /**
     * 获取request
     * @return Request
     */
    public function request() {
        return $this->req;
    }

    /**
     * 获取response
     * @return Response
     */
    public function Response() {
        return $this->resp;
    }
}