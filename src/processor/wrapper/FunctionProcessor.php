<?php
/**
 * Created by PhpStorm.
 * User: dzthink
 * Date: 2018/2/4
 * Time: 上午2:53
 */

namespace phpdo\processor\wrapper;


use phpdo\framework\Context;
use phpdo\framework\IProcessor;
use phpdo\framework\ProcessFlow;

class FunctionProcessor implements IProcessor{

    /**
     * @var \Closure
     */
    protected $callble;

    /**
     * FunctionProcessor constructor.
     */
    public function __construct($callble) {
        $this->callble = $callble;
    }

    /**
     * 处理请求
     * @param Context $context
     * @param ProcessFlow $processFlow
     * @return bool|IProcessor
     * @throws \Exception
     */
    public function process($context, ProcessFlow $processFlow) {
        call_user_func_array($this->callble, array($context, $processFlow));
    }
}