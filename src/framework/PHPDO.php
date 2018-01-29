<?php
namespace phpdo;

/**
 * phpdo核心
 * @Author dzthink@qq.com
 * @Date: 2017/8/11
 */

//todo 异常处理
class PHPDO {

    /**
     * @var IContainer
     */
    protected $container;

    /**
     * @var IConfig
     */
    protected $config;

    /**
     * @var ProcessFlow
     */
    protected $processFlow;


    public function __construct(IConfig $config, IContainer $container = null) {
        $this->config = $config;

        //todo if $contailer is null, create a default one
        $this->container = $container;
        
        $this->processFlow = new ProcessFlow();
    }

    /**
     * 处理请求
     * @param Context $context
     * @param IProcessor|\Closure $dispatcher
     * @return Context 
     */
    public function go(Context $context, IProcessor $dispatcher) {
        return null;
    }


    
    /**
     * 回收数据
     * @return void
     */
    public function terminate() {

    }
}