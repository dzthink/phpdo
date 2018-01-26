<?php
namespace phpdo;

/**
 * phpdo核心调度类
 * @Author dzthink@qq.com
 * @Date: 2017/8/11
 */
class PHPDO {

    /**
     * @var Dispatcher
     */
    private $dispatcher;

    /**
     * PHPDO constructor.
     */
    public function __construct() {
        $this->dispatcher = [];
    }

    /**
     *
     * @param Context $context
     */
    public static function start(Context $context) {
        $phpdo = new PHPDO();
        while (($dispatcher = $phpdo->dispatch()) != null) {
            $ret = $dispatcher->dispatch($phpdo, $context);
            //todo 检查返回值， 修改dipatcher队列
        }

        //已经完成或中断了所有处理器
    }

    /**
     * @return Dispatcher
     */
    protected function dispatch() {
        return null;
    }
}