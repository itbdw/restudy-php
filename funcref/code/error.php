<?php
/**
 * Created by PhpStorm.
 * User: zhaobinyan
 * Date: 2018/7/22
 * Time: 下午10:05
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

