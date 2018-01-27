<?php
namespace phpdo;

/**
 * phpdo核心
 * @Author dzthink@qq.com
 * @Date: 2017/8/11
 */
class PHPDO {


    public function __construct(IConfig $config) {

    }

    /**
     *  创建context
     * @return IContext
     */
    public function makeContext() {
        return null;
    }


    /**
     * 处理请求
     * @param IContext $context
     * @return IContext
     */
    public function process(IContext $context) {
        return null;
    }


    /**
     * 回收数据
     * @return void
     */
    public function terminate() {

    }
}