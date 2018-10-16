<?php
/**
 * Created by PhpStorm.
 * User: wlh
 * Date: 2018/10/16
 * Time: 9:40 AM
 */
/*
    单例模式
    单例模式确保某个类只有一个实例，而且自行实例化并向整个系统提供这个实例。
    单例模式是一种常见的设计模式，在计算机系统中，线程池、缓存、日志对象、对话框、打印机、数据库操作、显卡的驱动程序常被设计成单例。
    单例模式分3种：懒汉式单例、饿汉式单例、登记式单例。
    单例模式有以下3个特点：
    1．只能有一个实例。
    2．必须自行创建这个实例。
    3．必须给其他对象提供这一实例。
    那么为什么要使用PHP单例模式？
    PHP一个主要应用场合就是应用程序与数据库打交道的场景，在一个应用中会存在大量的数据库操作，针对数据库句柄连接数据库的行为，使用单例模式可以避免大量的new操作。因为每一次new操作都会消耗系统和内存的资源。
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