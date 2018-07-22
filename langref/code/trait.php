<?php
/**
 * Created by PhpStorm.
 * User: zhaobinyan
 * Date: 2018/7/22
 * Time: 下午6:45
 */

trait Living {
    public function breath() {
        return [__METHOD__, 'I\'m alive.'];
    }
}

class Animal {

    public function breath() {
        return [__METHOD__, 'I\'am animal.'];
    }
}

class People extends Animal {
    use Living;
}

var_dump((new People())->breath()); //self 》 trait 》parent
