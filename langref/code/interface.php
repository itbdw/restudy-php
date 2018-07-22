<?php
/**
 * Created by PhpStorm.
 * User: zhaobinyan
 * Date: 2018/7/22
 * Time: 下午6:37
 */

interface Speak {
    public function speak($word);
}

interface Smile {
    public function smile();
}

interface Animal extends Speak,Smile {

}

class People implements Speak,Smile {
    public function speak($word)
    {
        return [__METHOD__, func_get_args()];
    }

    public function smile()
    {
        return [__METHOD__];
    }
}

class Monkey implements Animal {
    public function speak($word)
    {
        return [__METHOD__, func_get_args()];
    }

    public function smile()
    {
        return [__METHOD__];
    }
}
var_dump((new People())->smile());
var_dump((new People())->speak('China'));

var_dump((new Monkey())->smile());
var_dump((new Monkey())->speak('China'));