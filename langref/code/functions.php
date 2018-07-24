<?php
/**
 * Created by PhpStorm.
 * User: zhaobinyan
 * Date: 2018/7/24
 * Time: 下午2:27
 */

function foo() {
    return 'bar';
}

$f = function ($params) {
    return $params;
};

var_dump(foo());
var_dump($f("function programming"));
