<?php
/**
 * Created by PhpStorm.
 * User: zhaobinyan
 * Date: 2018/7/22
 * Time: 下午8:14
 */

namespace China;
class People {
    public static $color = ['yello'];
}

/*------------*/

namespace USA;
class People {
    public static $color = ['yello', 'white', 'black'];
}

var_dump(\China\People::$color);
var_dump(\USA\People::$color);
var_dump(People::$color);
