<?php
/**
 * Created by PhpStorm.
 * User: zxduan
 * Date: 2018/1/27
 * Time: 17:07
 */

namespace phpdo;


interface IContext {


    /**
     * 设置配置信息
     * @param IConfig $config
     * @return void
     */
    public function config(IConfig $config);

}