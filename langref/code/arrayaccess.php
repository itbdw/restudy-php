<?php
/**
 * Created by PhpStorm.
 * User: zhaobinyan
 * Date: 2018/7/22
 * Time: 下午9:16
 */

class PeopleArray implements ArrayAccess {

    private $data = [];

    public function __get ($key) {
        return $this->data[$key];
    }

    public function __set($key,$value) {
        $this->data[$key] = $value;
    }

    public function __isset ($key) {
        return isset($this->data[$key]);
    }

    public function __unset($key) {
        unset($this->data[$key]);
    }


    public function offsetExists($offset)
    {
        return isset($this->data[$offset]);
    }

    public function offsetUnset($offset)
    {
        unset($this->data[$offset]);
    }

    public function offsetGet($offset)
    {
        if (isset($this->data[$offset])) {
            return $this->data[$offset];
        }
        return null;
    }

    public function offsetSet($offset, $value)
    {
        return $this->data[$offset] = $value;
    }

}


$obj = new PeopleArray();
$obj->id = 'id';

$obj['name'] = 'name';

var_dump($obj['id']);

var_dump($obj->name);