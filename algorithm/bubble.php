<?php
/**
 * Created by PhpStorm.
 * User: zhaobinyan
 * Date: 2018/8/9
 * Time: 下午11:09
 */

//对需要排序的数组从后往前（逆序）进行多遍的扫描，当发现相邻的两个数值的次序与排序要求的规则不一致时，
//就将这两个数值进行交换。这样比较小（大）的数值就将逐渐从后面向前面移动。


function bubble($array) {
    $length = count($array);

    for ($i = 0; $i < $length; $i++) {
        for ($j = 0; $j < $length - $i - 1; $j++) {

            if ($array[$j] < $array[$j+1]) {
                $tmp = $array[$j];

                $array[$j] = $array[$j+1];
                $array[$j+1] = $tmp;
            }
        }

    }



    return $array;
}

var_dump(bubble([
   2,6,3,1,4,7
]));