<?php
namespace phpdo\framework;

/**
 * phpdo核心
 * @Author dzthink@qq.com
 * @Date: 2017/8/11
 */

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
     * @param IProcessor|\Closure $dispatcher
     * @return Context 
     */
    public function go(IProcessor $dispatcher) {
        $context = $this->makeContext();
        $this->processFlow->back($dispatcher);
        $this->processFlow->process($context);
        return $context;
    }



    /**
     * 回收数据
     * @return void
     */
    public function terminate() {

    }

    /**
     * 创建context
     * @return Context
     */
    protected function makeContext() {
        $context = $this->container->make(Context::class);
        $context->initialize(); 
        return $context;
    }

    /**
     * 获取容器对象
     * @return IContainer
     */
    public function getContainer() {
        return $this->container;
    }

}
