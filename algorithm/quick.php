<?php
/**
 * Created by PhpStorm.
 * User: zhaobinyan
 * Date: 2018/8/9
 * Time: 下午11:17
 */

//在数组中挑出一个元素（多为第一个）作为标尺，扫描一遍数组将比标尺小的元素排在标尺之前，
//将所有比标尺大的元素排在标尺之后，通过递归将各子序列分别划分为更小的序列直到所有的序列顺序一致。

function quick($array) {
    //先判断是否需要继续进行
    $length = count($array);
    if($length <= 1)
    {
        return $array;
    }

    $base_num = $array[0];//选择一个标尺  选择第一个元素

    //初始化两个数组
    $left_array = array();//小于标尺的
    $right_array = array();//大于标尺的
    for($i=1; $i<$length; $i++)
    {            //遍历 除了标尺外的所有元素，按照大小关系放入两个数组内
        if($base_num > $array[$i])
        {
            //放入左边数组
            $left_array[] = $array[$i];
        }
        else
        {
            //放入右边
            $right_array[] = $array[$i];
        }
    }
    //再分别对 左边 和 右边的数组进行相同的排序处理方式
    //递归调用这个函数,并记录结果
    $left_array = quick($left_array);
    $right_array = quick($right_array);
    //合并左边 标尺 右边
    return array_merge($left_array, array($base_num), $right_array);
}


var_dump(bubble([
    2,6,3,1,4,7
]));