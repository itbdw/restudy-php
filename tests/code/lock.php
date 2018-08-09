<?php
/**
 * Created by PhpStorm.
 * User: zhaobinyan
 * Date: 2018/8/8
 * Time: 下午2:19
 */

include dirname(__DIR__) . '/vendor/autoload.php';
include dirname(__DIR__) . '/vendor/chargeover/redlock-php/src/RedLock.php';


$servers = [
    ['localhost', "6379", 1]
];


$redlock = new RedLock($servers);
$res = $redlock->lock("good", 100);

var_dump($res);

if ($res) {


}

//
//$redis = new Redis();
//$redis->connect("localhost");
//
//$key = 'hello';
//$val = 'world22';
//
//$random = rand(1,100);
//$ttl = 100;
//
//$res = $redis->set($key, $random, array('nx', 'ex' => $ttl));
//if ($res) {
//
//}
//
//var_dump($res, $redis->get($key));
//

