<?php
/**
 * Created by PhpStorm.
 * User: zhaobinyan
 * Date: 2018/7/22
 * Time: 下午8:21
 */

error_reporting(E_ALL);

//注意如果想catch error 和 exception 需要用 Throwable

try {

    throw new ErrorException('err ex');

    throw new Exception('ex');

    throw new Error('error');


} catch (Throwable $e) {

    echo "catch ".$e->getCode() . ' ' .$e->getMessage() . ' ' . $e->getFile() . ' ' . $e->getLine();

    echo PHP_EOL;

    if ($e instanceof Error) {
        echo "error";
    }
    if ($e instanceof Exception) {
        echo "exception";
    }
}

echo PHP_EOL;