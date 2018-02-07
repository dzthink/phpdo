<?php
/**
 * Created by PhpStorm.
 * User: dzthink
 * Date: 2018/2/4
 * Time: 下午5:31
 */

namespace phpdo\processor\wrapper;


use phpdo\framework\Context;
use phpdo\framework\IProcessor;
use phpdo\framework\ProcessFlow;

class MethodProcessor implements IProcessor{
    protected $controller;
    
    protected $method;

    public function __construct($class, $m) {

    }


    /**
     * 处理请求
     * @param Context $context
     * @param ProcessFlow $processFlow
     * @return bool|IProcessor
     * @throws \Exception
     */
    public function process($context, ProcessFlow $processFlow)
    {
        // TODO: Implement process() method.
    }
}