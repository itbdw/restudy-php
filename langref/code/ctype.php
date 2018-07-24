<?php
/**
 * Created by PhpStorm.
 * User: zhaobinyan
 * Date: 2018/7/25
 * Time: 上午3:49
 */

var_dump(ctype_alnum("22a2"));
var_dump(ctype_digit("33a33"));

var_dump(ctype_alnum("3.33"));
var_dump(ctype_digit("33.3"));

debug_zval_dump((object)['3']);

/**
 * ctype_alnum — 做字母和数字字符检测
ctype_alpha — 做纯字符检测
ctype_cntrl — 做控制字符检测
ctype_digit — 做纯数字检测
ctype_graph — 做可打印字符串检测，空格除外
ctype_lower — 做小写字符检测
ctype_print — 做可打印字符检测
ctype_punct — 检测可打印的字符是不是不包含空白、数字和字母
ctype_space — 做空白字符检测
ctype_upper — 做大写字母检测
ctype_xdigit — 检测字符串是否只包含十六进制字符
 */