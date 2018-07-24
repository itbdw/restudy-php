<?php
/**
 * Created by PhpStorm.
 * User: zhaobinyan
 * Date: 2018/7/25
 * Time: 上午2:36
 */
//
$arr1 = ['a1', 'a2'];
$arr2 = ['b1', 'b2'];

$res1 = array_map(function($k1, $k2, $k3) {
    return $k1 . $k2 . $k3;

}, $arr1, $arr2, $arr2);

var_dump(__LINE__, $res1);


$res2 = array_map(function($k1) {
    return $k1;
}, $arr1);

var_dump(__LINE__, $res2);


/*==============*/
//
array_walk($arr1, function(&$value, $key, $userdata) {
    $value = $value . $userdata;
}, 'what');
var_dump(__LINE__, $arr1);

//
///*===============*/
$arr1 = ['a1', 'a2'];
$arr2 = ['b1', 'b2'];
$arr1['test'] = $arr2;

array_walk_recursive($arr1, function(&$value, $key, $userdata) {
    $value = $key . $value . $userdata;
}, 'what');
var_dump(__LINE__, $arr1);
//
//
$arr1 = ['a1', 'a2'];
var_dump(__LINE__, array_filter($arr1));
var_dump(__LINE__, array_filter($arr1, function($v, $k) {
    if ($k === 1) {
        return true;
    }

    if ($v === 'a1') {
        return true;
    }
}, ARRAY_FILTER_USE_BOTH));

$arr1 = ['a1', 'a2'];
array_filter($arr1, function($v) {
    var_dump(__LINE__, func_get_args());
}, 0);

$arr1 = ['a1', 'a2'];
array_filter($arr1, function($k) {
    var_dump(__LINE__, func_get_args());
}, ARRAY_FILTER_USE_KEY);

$arr1 = ['a1', 'a2'];
array_filter($arr1, function($v, $k) {
    var_dump(__LINE__, func_get_args());
}, ARRAY_FILTER_USE_BOTH);



/**
 *
array_change_key_case — 将数组中的所有键名修改为全大写或小写
array_chunk — 将一个数组分割成多个
array_column — 返回数组中指定的一列
array_combine — 创建一个数组，用一个数组的值作为其键名，另一个数组的值作为其值
array_count_values — 统计数组中所有的值
array_diff_assoc — 带索引检查计算数组的差集
array_diff_key — 使用键名比较计算数组的差集
array_diff_uassoc — 用用户提供的回调函数做索引检查来计算数组的差集
array_diff_ukey — 用回调函数对键名比较计算数组的差集
array_diff — 计算数组的差集
array_fill_keys — 使用指定的键和值填充数组
array_fill — 用给定的值填充数组
array_filter — 用回调函数过滤数组中的单元
array_flip — 交换数组中的键和值
array_intersect_assoc — 带索引检查计算数组的交集
array_intersect_key — 使用键名比较计算数组的交集
array_intersect_uassoc — 带索引检查计算数组的交集，用回调函数比较索引
array_intersect_ukey — 用回调函数比较键名来计算数组的交集
array_intersect — 计算数组的交集
array_key_exists — 检查数组里是否有指定的键名或索引
array_key_first — Gets the first key of an array
array_key_last — Gets the last key of an array
array_keys — 返回数组中部分的或所有的键名
array_map — 为数组的每个元素应用回调函数
array_merge_recursive — 递归地合并一个或多个数组
array_merge — 合并一个或多个数组
array_multisort — 对多个数组或多维数组进行排序
array_pad — 以指定长度将一个值填充进数组
array_pop — 弹出数组最后一个单元（出栈）
array_product — 计算数组中所有值的乘积
array_push — 将一个或多个单元压入数组的末尾（入栈）
array_rand — 从数组中随机取出一个或多个单元
array_reduce — 用回调函数迭代地将数组简化为单一的值
array_replace_recursive — 使用传递的数组递归替换第一个数组的元素
array_replace — 使用传递的数组替换第一个数组的元素
array_reverse — 返回单元顺序相反的数组
array_search — 在数组中搜索给定的值，如果成功则返回首个相应的键名
array_shift — 将数组开头的单元移出数组
array_slice — 从数组中取出一段
array_splice — 去掉数组中的某一部分并用其它值取代
array_sum — 对数组中所有值求和
array_udiff_assoc — 带索引检查计算数组的差集，用回调函数比较数据
array_udiff_uassoc — 带索引检查计算数组的差集，用回调函数比较数据和索引
array_udiff — 用回调函数比较数据来计算数组的差集
array_uintersect_assoc — 带索引检查计算数组的交集，用回调函数比较数据
array_uintersect_uassoc — 带索引检查计算数组的交集，用单独的回调函数比较数据和索引
array_uintersect — 计算数组的交集，用回调函数比较数据
array_unique — 移除数组中重复的值
array_unshift — 在数组开头插入一个或多个单元
array_values — 返回数组中所有的值
array_walk_recursive — 对数组中的每个成员递归地应用用户函数
array_walk — 使用用户自定义函数对数组中的每个元素做回调处理
array — 新建一个数组
arsort — 对数组进行逆向排序并保持索引关系
asort — 对数组进行排序并保持索引关系
compact — 建立一个数组，包括变量名和它们的值
count — 计算数组中的单元数目，或对象中的属性个数
current — 返回数组中的当前单元
each — 返回数组中当前的键／值对并将数组指针向前移动一步
end — 将数组的内部指针指向最后一个单元
extract — 从数组中将变量导入到当前的符号表
in_array — 检查数组中是否存在某个值
key_exists — 别名 array_key_exists
key — 从关联数组中取得键名
krsort — 对数组按照键名逆向排序
ksort — 对数组按照键名排序
list — 把数组中的值赋给一组变量
natcasesort — 用“自然排序”算法对数组进行不区分大小写字母的排序
natsort — 用“自然排序”算法对数组排序
next — 将数组中的内部指针向前移动一位
pos — current 的别名
prev — 将数组的内部指针倒回一位
range — 根据范围创建数组，包含指定的元素
reset — 将数组的内部指针指向第一个单元
rsort — 对数组逆向排序
shuffle — 打乱数组
sizeof — count 的别名
sort — 对数组排序
uasort — 使用用户自定义的比较函数对数组中的值进行排序并保持索引关联
uksort — 使用用户自定义的比较函数对数组中的键名进行排序
usort — 使用用户自定义的比较函数对数组中的值进行排序
add a note add a note

 */


