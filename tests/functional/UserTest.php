<?php

use Framins\Slim\Test\SlimCase;

class UserTest extends \Codeception\Test\Unit
{
    /**
     * @var SlimCase
     */
    protected $slimCase;

    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
        $app = include __DIR__ . '/../../bootstrap.php';
        $this->slimCase = new SlimCase($app);
    }

    protected function _after()
    {
        $this->slimCase = null;
    }

    // tests
    public function testHelloSomeoneCall()
    {
        // Arrange
        $url = '/hello/Miles';

        // Act
        $this->slimCase->get($url);

        // Assert
        $this->slimCase->seeResponseOk();
        $this->slimCase->seeResponseContains('Hello');
        $this->slimCase->seeResponseContains('Miles');
    }
}
