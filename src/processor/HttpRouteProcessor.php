<?php
/**
 * Created by PhpStorm.
 * User: zxduan
 * Date: 2018/1/29
 * Time: 19:31
 */

namespace phpdo\processor;


use phpdo\context\HttpContext;
use phpdo\framework\Context;
use phpdo\framework\IProcessor;
use phpdo\framework\ProcessFlow;

class HttpRouteProcessor implements IProcessor {

    /**
     * 处理请求
     * @param HttpContext $context
     * @param ProcessFlow $processFlow
     * @return bool|IProcessor
     * @throws \Exception
     */
    public function process($context, ProcessFlow $processFlow) {
        echo $context->request()->getPathInfo();
    }

}