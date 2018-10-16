<?php
/**
 * Created by PhpStorm.
 * User: wlh
 * Date: 2018/10/16
 * Time: 9:40 AM
 */

class Single
{
    private $name;//声明一个私有的实例变量

    private function __construct()
    {//声明私有构造方法为了防止外部代码使用new来创建对象。
    }

    static public $instance;//声明一个静态变量（保存在类中唯一的一个实例）

    static public function getinstance()
    {//声明一个getinstance()静态方法，用于检测是否有实例对象
        if (!self::$instance) self::$instance = new self();
        return self::$instance;
    }

    public function setname($n)
    {
        $this->name = $n;
    }

    public function getname()
    {
        return $this->name;
    }
}

$oa = Single::getinstance();
$ob = Single::getinstance();
$oa->setname('hello world');
$ob->setname('good morning');
echo $oa->getname();//good morning
echo $ob->getname();//good morning