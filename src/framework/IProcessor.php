<?php
/**
 * processor 接口定义
 */

namespace phpdo;


interface IProcessor {

    /**
     * 处理请求
     * @param Context $context
     * @param ProcessFlow $processFlow
     * @return bool
     * @throws \Exception
     */
    public function process(Context $context, ProcessFlow $processFlow);

}