<?php
/**
 * Created by PhpStorm.
 * User: zhaobinyan
 * Date: 2018/8/9
 * Time: 下午11:45
 */

//从数组的第一个元素开始一个一个向下查找，如果有和目标一致的元素，查找成功；如果到最后一个元素仍没有目标元素，则查找失败。

function ordersearch($array, $find) {
    $length = count($array);
    for ($i=0; $i < $length; $i++) {
        if ($array[$i] == $find) {
            return $find;
        }
    }

    return false;
}


var_dump(ordersearch([1,2,3,8],  4));
var_dump(ordersearch([1,2,3,4,5,6,7],  5));