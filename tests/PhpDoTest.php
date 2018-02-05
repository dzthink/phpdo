<?php
/**
 * Created by PhpStorm.
 * User: zxduan
 * Date: 2018/2/1
 * Time: 19:31
 */

namespace phpdo\tests;


use phpdo\context\HttpContext;
use phpdo\framework\Config;
use phpdo\framework\Context;
use phpdo\framework\PHPDO;
use PHPUnit\Framework\SkippedTest;
use PHPUnit\Framework\TestCase;

abstract class PhpDoTest extends TestCase {

    /**
     * @var \phpdo\framework\PHPDO
     */
    protected $PHPDO;

    public function setUp() {
        parent::setUp();
        $this->PHPDO = new PHPDO(new Config());
        $container = $this->PHPDO->getContainer();
        $container->bind(Context::class, HttpContext::class);
    }

}