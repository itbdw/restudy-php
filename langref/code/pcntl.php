<?php
/**
 * Created by PhpStorm.
 * User: zhaobinyan
 * Date: 2018/7/25
 * Time: 上午4:08
 */


/**
 *
pcntl_alarm — 为进程设置一个alarm闹钟信号
pcntl_async_signals — Enable/disable asynchronous signal handling or return the old setting
pcntl_errno — 别名 pcntl_get_last_error
pcntl_exec — 在当前进程空间执行指定程序
pcntl_fork — 在当前进程当前位置产生分支（子进程）。译注：fork是创建了一个子进程，父进程和子进程 都从fork的位置开始向下继续执行，不同的是父进程执行过程中，得到的fork返回值为子进程 号，而子进程得到的是0。
pcntl_get_last_error — Retrieve the error number set by the last pcntl function which failed
pcntl_getpriority — 获取任意进程的优先级
pcntl_setpriority — 修改任意进程的优先级
pcntl_signal_dispatch — 调用等待信号的处理器
pcntl_signal_get_handler — Get the current handler for specified signal
pcntl_signal — 安装一个信号处理器
pcntl_sigprocmask — 设置或检索阻塞信号
pcntl_sigtimedwait — 带超时机制的信号等待
pcntl_sigwaitinfo — 等待信号
pcntl_strerror — Retrieve the system error message associated with the given errno
pcntl_wait — 等待或返回fork的子进程状态
pcntl_waitpid — 等待或返回fork的子进程状态
pcntl_wexitstatus — 返回一个中断的子进程的返回代码
pcntl_wifexited — 检查状态代码是否代表一个正常的退出。
pcntl_wifsignaled — 检查子进程状态码是否代表由于某个信号而中断
pcntl_wifstopped — 检查子进程当前是否已经停止
pcntl_wstopsig — 返回导致子进程停止的信号
pcntl_wtermsig — 返回导致子进程中断的信号

 */