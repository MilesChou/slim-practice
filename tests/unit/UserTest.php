<?php
declare(strict_types=1);

namespace Miles\Slim;

class UserTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    public function testSayHelloWhenNameIsMilesWillReturnHelloMiles()
    {
        // Arrange
        $name = 'Miles';
        $target = new User($name);
        $expected = 'Hello, Miles';

        // Act
        $actual = $target->sayHello();

        // Assert
        $this->assertEquals($expected, $actual);
    }
}
