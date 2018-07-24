<?php
/**
 * Created by PhpStorm.
 * User: zhaobinyan
 * Date: 2018/7/25
 * Time: 上午3:06
 */

class SimpleMath {
    public static function sum($a, $b) {
        return $a+$b;
    }
}

class_alias(\SimpleMath::class, "Math");
var_dump(__LINE__, \Math::sum(1,2));

var_dump(__LINE__, class_exists('Math'));

abstract class bar {
    public function __construct()
    {
        var_dump(__LINE__, get_class($this));
        var_dump(__LINE__, get_class());
    }
}

class foo extends bar {
}
new foo;



/**
 *
class_alias — 为一个类创建别名
class_exists — 检查类是否已定义
get_called_class — 后期静态绑定（"Late Static Binding"）类的名称
get_class_methods — 返回由类的方法名组成的数组
get_class_vars — 返回由类的默认属性组成的数组
get_class — 返回对象的类名
get_declared_classes — 返回由已定义类的名字所组成的数组
get_declared_interfaces — 返回一个数组包含所有已声明的接口
get_declared_traits — 返回所有已定义的 traits 的数组
get_object_vars — 返回由对象属性组成的关联数组
get_parent_class — 返回对象或类的父类名
interface_exists — 检查接口是否已被定义
is_a — 如果对象属于该类或该类是此对象的父类则返回 TRUE
is_subclass_of — 如果此对象是该类的子类，则返回 TRUE
method_exists — 检查类的方法是否存在
property_exists — 检查对象或类是否具有该属性
trait_exists — 检查指定的 trait 是否存在
 * */