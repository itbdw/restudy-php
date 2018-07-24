<?php
/**
 * Created by PhpStorm.
 * User: zhaobinyan
 * Date: 2018/7/22
 * Time: 下午8:21
 */

error_reporting(E_ALL);


//all error to exception
set_error_handler(function ($level, $message, $file = '', $line = 0) {
    if ($level) {
        throw new ErrorException($message, 0, $level, $file, $line);
    }
});

//dump exception
set_exception_handler(function (Throwable $e) {
    var_dump($e->__toString());
});

function he(...$args) {
//    var_dump(debug_backtrace());
    debug_print_backtrace();
    return 'hello';
}

//trigger_error("hello");

he('nice');


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