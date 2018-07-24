<?php
/**
 * Created by PhpStorm.
 * User: zhaobinyan
 * Date: 2018/7/24
 * Time: 下午2:27
 */

register_shutdown_function(function() {
    echo "I'm called after die or executed finished.\n";
});


declare(ticks = 1);



$startTime = microtime(true);
$tick = true;
$closure = function () use ($startTime, &$tick) {

    echo memory_get_usage() . "\n";
};

try {
    register_tick_function($closure);
    //do your code

    sleep(1);
    $a = rand(0, 10000000);
    sleep(1);
    sleep(1);
    echo __LINE__;


} catch (\Exception $e) {
    throw $e;
} finally {
    unregister_tick_function($closure);
};

class Human {
    public function hi() {
        return 'hi';
    }

    public static function getHeight(...$params) {
        var_dump($params);
        return rand(170, 180);
    }
}

function foo() {
    return 'bar';
}

$f = function ($params) {
    return $params;
};

var_dump(foo());
var_dump($f("function programming"));


//mixed call_user_func_array ( callable $callback , array $param_arr )

call_user_func_array(function($p1, $p2) {
    var_dump(func_get_args());
    var_dump($p1, $p2);
}, ['param1', 'param2']);

$res = call_user_func_array(array(Human::class, 'getHeight'), ['p1', 'p2']);
var_dump($res);

$res = call_user_func_array(array(new Human(), 'getHeight'), ['p1', 'p2']);
var_dump($res);

//第二个参数传到回调，变为所有参数
$res = call_user_func_array(array(new Human(), 'hi'), ['p1', 'p2']);
var_dump($res);

//参数是变长的
$res = call_user_func(array(new Human(), 'hi'), ['p1', 'p2']);
var_dump($res);

//
$res = call_user_func(array(new Human(), 'getHeight'), "param1", "param2");
var_dump($res);
die('no');


/**
 *
 * call_user_func_array — 调用回调函数，并把一个数组参数作为回调函数的参数
call_user_func — 把第一个参数作为回调函数调用
create_function — Create an anonymous (lambda-style) function
forward_static_call_array — Call a static method and pass the arguments as array
forward_static_call — Call a static method
func_get_arg — 返回参数列表的某一项
func_get_args — 返回一个包含函数参数列表的数组
func_num_args — Returns the number of arguments passed to the function
function_exists — 如果给定的函数已经被定义就返回 TRUE
get_defined_functions — 返回所有已定义函数的数组
register_shutdown_function — 注册一个会在php中止时执行的函数
register_tick_function — Register a function for execution on each tick
unregister_tick_function — De-register a function for execution on each tick
 *
 *
 *
ignore_user_abort — 设置客户端断开连接时是否中断脚本的执行

sys_getloadavg — 获取系统的负载（load average）





addcslashes — 以 C 语言风格使用反斜线转义字符串中的字符
addslashes — 使用反斜线引用字符串
bin2hex — 函数把包含数据的二进制字符串转换为十六进制值
chop — rtrim 的别名
chr — 返回指定的字符
chunk_split — 将字符串分割成小块
convert_cyr_string — 将字符由一种 Cyrillic 字符转换成另一种
convert_uudecode — 解码一个 uuencode 编码的字符串
convert_uuencode — 使用 uuencode 编码一个字符串
count_chars — 返回字符串所用字符的信息
crc32 — 计算一个字符串的 crc32 多项式
crypt — 单向字符串散列
echo — 输出一个或多个字符串
explode — 使用一个字符串分割另一个字符串
fprintf — 将格式化后的字符串写入到流
get_html_translation_table — 返回使用 htmlspecialchars 和 htmlentities 后的转换表
hebrev — 将逻辑顺序希伯来文（logical-Hebrew）转换为视觉顺序希伯来文（visual-Hebrew）
hebrevc — 将逻辑顺序希伯来文（logical-Hebrew）转换为视觉顺序希伯来文（visual-Hebrew），并且转换换行符
hex2bin — 转换十六进制字符串为二进制字符串
html_entity_decode — Convert all HTML entities to their applicable characters
htmlentities — 将字符转换为 HTML 转义字符
htmlspecialchars_decode — 将特殊的 HTML 实体转换回普通字符
htmlspecialchars — 将特殊字符转换为 HTML 实体
implode — 将一个一维数组的值转化为字符串
join — 别名 implode
lcfirst — 使一个字符串的第一个字符小写
levenshtein — 计算两个字符串之间的编辑距离
localeconv — Get numeric formatting information
ltrim — 删除字符串开头的空白字符（或其他字符）
md5_file — 计算指定文件的 MD5 散列值
md5 — 计算字符串的 MD5 散列值
metaphone — Calculate the metaphone key of a string
money_format — 将数字格式化成货币字符串
nl_langinfo — Query language and locale information
nl2br — 在字符串所有新行之前插入 HTML 换行标记
number_format — 以千位分隔符方式格式化一个数字
ord — 返回字符的 ASCII 码值
parse_str — 将字符串解析成多个变量
print — 输出字符串
printf — 输出格式化字符串
quoted_printable_decode — 将 quoted-printable 字符串转换为 8-bit 字符串
quoted_printable_encode — 将 8-bit 字符串转换成 quoted-printable 字符串
quotemeta — 转义元字符集
rtrim — 删除字符串末端的空白字符（或者其他字符）
setlocale — 设置地区信息
sha1_file — 计算文件的 sha1 散列值
sha1 — 计算字符串的 sha1 散列值
similar_text — 计算两个字符串的相似度
soundex — Calculate the soundex key of a string
sprintf — Return a formatted string
sscanf — 根据指定格式解析输入的字符
str_getcsv — 解析 CSV 字符串为一个数组
str_ireplace — str_replace 的忽略大小写版本
str_pad — 使用另一个字符串填充字符串为指定长度
str_repeat — 重复一个字符串
str_replace — 子字符串替换
str_rot13 — 对字符串执行 ROT13 转换
str_shuffle — 随机打乱一个字符串
str_split — 将字符串转换为数组
str_word_count — 返回字符串中单词的使用情况
strcasecmp — 二进制安全比较字符串（不区分大小写）
strchr — 别名 strstr
strcmp — 二进制安全字符串比较
strcoll — 基于区域设置的字符串比较
strcspn — 获取不匹配遮罩的起始子字符串的长度
strip_tags — 从字符串中去除 HTML 和 PHP 标记
stripcslashes — 反引用一个使用 addcslashes 转义的字符串
stripos — 查找字符串首次出现的位置（不区分大小写）
stripslashes — 反引用一个引用字符串
stristr — strstr 函数的忽略大小写版本
strlen — 获取字符串长度
strnatcasecmp — 使用“自然顺序”算法比较字符串（不区分大小写）
strnatcmp — 使用自然排序算法比较字符串
strncasecmp — 二进制安全比较字符串开头的若干个字符（不区分大小写）
strncmp — 二进制安全比较字符串开头的若干个字符
strpbrk — 在字符串中查找一组字符的任何一个字符
strpos — 查找字符串首次出现的位置
strrchr — 查找指定字符在字符串中的最后一次出现
strrev — 反转字符串
strripos — 计算指定字符串在目标字符串中最后一次出现的位置（不区分大小写）
strrpos — 计算指定字符串在目标字符串中最后一次出现的位置
strspn — 计算字符串中全部字符都存在于指定字符集合中的第一段子串的长度。
strstr — 查找字符串的首次出现
strtok — 标记分割字符串
strtolower — 将字符串转化为小写
strtoupper — 将字符串转化为大写
strtr — 转换指定字符
substr_compare — 二进制安全比较字符串（从偏移位置比较指定长度）
substr_count — 计算字串出现的次数
substr_replace — 替换字符串的子串
substr — 返回字符串的子串
trim — 去除字符串首尾处的空白字符（或者其他字符）
ucfirst — 将字符串的首字母转换为大写
ucwords — 将字符串中每个单词的首字母转换为大写
vfprintf — 将格式化字符串写入流
vprintf — 输出格式化字符串
vsprintf — 返回格式化字符串
wordwrap — 打断字符串为指定数量的字串
 * *
 */