<?php
/**
 * Created by PhpStorm.
 * User: zhaobinyan
 * Date: 2018/7/22
 * Time: 下午6:30
 */

abstract class People {
    abstract public function speak($word);
}

class Student extends People {
    public function speak($word)
    {
        return [__METHOD__, func_get_args()];
    }
}

class Teacher extends People {
    public function speak($word)
    {
        return [__METHOD__, func_get_args()];
    }
}

var_dump((new Student())->speak("bee"));

var_dump((new Teacher())->speak("bee"));