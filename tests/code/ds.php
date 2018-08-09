<?php
/**
 * Created by PhpStorm.
 * User: zhaobinyan
 * Date: 2018/8/9
 * Time: 下午11:53
 */
include dirname(__DIR__) . '/vendor/autoload.php';

$vector = new Ds\Vector();

$vector->push("good");
$vector->push("morning");
$vector->push("child");
var_dump($vector->toArray());

$map = new Ds\Map();
$map->put("foo", "bar");
var_dump($map->toArray());

$pair = new Ds\Pair();
$pair->key = 'est';
$pair->value = "china";
var_dump($pair->toArray());

$queue = new Ds\Queue();
$queue->push("hello");
var_dump($queue->toArray());

$set = new Ds\Set();
$set->add("helo");
var_dump($set->toArray());

$stack = new Ds\Stack();
$stack->push("a");
$stack->push("b");
var_dump($stack->pop());
var_dump($stack->pop());
var_dump($stack->pop());

