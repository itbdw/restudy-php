<?php
/**
 * Created by PhpStorm.
 * User: zhaobinyan
 * Date: 2018/8/13
 * Time: 下午4:07
 */


$need = "abcdefghijklmngh34i";
$find = "gh";

function find_position($need, $find)
{
    $length = strlen($need);
    for ($i = 0; $i < $length; $i++) {
        $sub_need = substr($need, $i);
        if (strpos($sub_need, $find) === 0) {
            echo $i . "\n";
        }
    }
}

find_position($need, $find);


echo "\n\n";

$str = "ssa334sfsfsfsf3424242hele444";

function format_str($str)
{
    $length = strlen($str);

    for ($i = 0; $i < $length - 1; $i++) {
        echo $str[$i]."";
        if (is_numeric($str[$i])) {
            if (!is_numeric($str[$i+1])) {
                echo ";";
            }
        } else {
            if (is_numeric($str[$i+1])) {
                echo ":";
            }
        }

    }


}

format_str($str);