<?php
/**
 * Created by PhpStorm.
 * User: zhaobinyan
 * Date: 2018/8/9
 * Time: 下午11:22
 */

//假设数据是按升序排序的，对于给定值x，从序列的中间位置开始比较，如果当前位置值等于x，则查找成功；
//若x小于当前位置值，则在数列的前半段中查找；若x大于当前位置值则在数列的后半段中继续查找，直到找到为止。（数据量大的时候使用）

function bisearch($array, $find) {
    $length = count($array);

    if ($length == 0) {
        return false;
    }

    if ($length == 1) {
        if ($array[0] == $find) {
            return $array[0];
        } else {
            return false;
        }
    }

    $center = ceil($length / 2);

    if ($find < $array[$center]) {
        return bisearch(array_slice($array, 0, $center), $find);
    } else if ($find > $array[$center]) {
        return bisearch(array_slice($array, $center, $length-$center), $find);
    } else {
        return $array[$center];
    }
}


var_dump(bisearch([1,2,3,8],  4));
var_dump(bisearch([1,2,3,4,5,6,7],  5));