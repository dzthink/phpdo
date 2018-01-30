<?php

use phpdo\framework\Context;
use \phpdo\context\HttpContext;
class PHPDOTest extends \PHPUnit\Framework\TestCase {

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

    public function testHello() {
        $context = $this->PHPDO->makeContext();
        $context->setRequest(\phpdo\http\Request::create("/phoneix/api.php", "GET", array("a")));
        $this->PHPDO->go($context, new \phpdo\processor\HttpRouteProcessor());
    }
}
