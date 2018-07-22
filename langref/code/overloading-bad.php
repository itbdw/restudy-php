<?php
/**
 * Created by PhpStorm.
 * User: zhaobinyan
 * Date: 2018/7/22
 * Time: 下午7:52
 */

//官方文档说这是重载，overloading，觉得挺奇怪的。
//同时了解有这么个东西就行了，业务代码可别用这玩意儿。

class MagicClass {
    private $data = [];

    public function __get($name)
    {
        if (isset($this->data[$name])) {
            return $this->data[$name];
        }
        return null;
    }

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function __isset($name)
    {
        return isset($this->data[$name]);
    }

    public function __unset($name)
    {
        unset($this->data[$name]);
    }

    public function __call($name, $arguments)
    {
        return call_user_func_array($name, $arguments);
    }

    public static function __callStatic($name, $arguments)
    {
        return call_user_func_array($name, $arguments);
    }
}

$class = new MagicClass();

var_dump($class->id);
var_dump(isset($class->id));

$class->name = 'test';

var_dump($class->name);
var_dump(isset($class->name));

var_dump($class->strlen('eee'));
var_dump($class->array_values(range(1, 10)));

