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

/**
debug_backtrace — 产生一条回溯跟踪(backtrace)
debug_print_backtrace — 打印一条回溯。
error_clear_last — 清除最近一次错误
error_get_last — 获取最后发生的错误
error_log — 发送错误信息到某个地方
error_reporting — 设置应该报告何种 PHP 错误
restore_error_handler — 还原之前的错误处理函数
restore_exception_handler — 恢复之前定义过的异常处理函数。
set_error_handler — 设置用户自定义的错误处理函数
set_exception_handler — 设置用户自定义的异常处理函数
trigger_error — 产生一个用户级别的 error/warning/notice 信息
user_error — trigger_error 的别名
add a note add a note
 *
 */