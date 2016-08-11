<?php
declare(strict_types=1);

namespace Miles\Slim;

/**
 * User Class
 */
class User
{
    /**
     * User name
     *
     * @var string
     */
    private $name;

    /**
     * Set name for this user object
     *
     * @param $name string
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * Say Hello
     */
    public function sayHello() : string
    {
        return "Hello, " . $this->name;
    }
}
