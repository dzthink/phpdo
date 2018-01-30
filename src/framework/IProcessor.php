<?php
/**
 * processor 接口定义
 */

namespace phpdo\framework;


interface IProcessor {

    /**
     * 处理请求
     * @param Context $context
     * @param ProcessFlow $processFlow
     * @return bool|IProcessor
     * @throws \Exception
     */
    public function process($context, ProcessFlow $processFlow);

}