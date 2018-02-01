<?php
/**
 * Created by PhpStorm.
 * User: zxduan
 * Date: 2018/2/1
 * Time: 19:31
 */

namespace phpdo\tests;


use PHPUnit\Framework\TestCase;

class PhpDoTest extends TestCase {

    /**
     * @var \phpdo\framework\PHPDO
     */
    protected $PHPDO;

    public function setUp() {
        parent::setUp();
        $this->PHPDO = new \phpdo\framework\PHPDO(new \phpdo\framework\Config());
        $container = $this->PHPDO->getContainer();
        $container->bind(Context::class, HttpContext::class);
    }

}