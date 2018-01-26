<?php
namespace phpdo;

/**
 * phpdo核心
 * @Author dzthink@qq.com
 * @Date: 2017/8/11
 */
abstract class PHPDO {

    /**
     *  根据应用类型创建不同类型application context
     */
    protected abstract function createContext();
}