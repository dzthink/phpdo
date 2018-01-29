<?php
/**
 * Created by PhpStorm.
 * User: zxduan
 * Date: 2018/1/29
 * Time: 19:31
 */

namespace phpdo\processor;


use phpdo\framework\Context;
use phpdo\framework\IProcessor;
use phpdo\framework\ProcessFlow;

class RouteProcessor implements IProcessor {

    /**
     * 处理请求
     * @param Context $context
     * @param ProcessFlow $processFlow
     * @return bool|IProcessor
     * @throws \Exception
     */
    public function process(Context $context, ProcessFlow $processFlow) {
        // TODO: Implement process() method.
    }
}