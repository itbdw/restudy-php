<?php
/**
 * Created by PhpStorm.
 * User: zhaobinyan
 * Date: 2018/7/24
 * Time: 下午4:53
 *
 * @see https://en.wikipedia.org/wiki/Singleton_pattern
 */

final class Singleton {
    private static $instance;

    private function __construct()
    {
    }

    /**
     * 单例很容易忘记写这个，虽然很少人用 clone
     */
    private function __clone()
    {
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function foo() {
        return 'bar';
    }

}

//$singleton = new Singleton();

$singleton = Singleton::getInstance();

var_dump($singleton->foo());
