<?php

/**
 * Created by PhpStorm.
 * User: wlh
 * Date: 2018/10/16
    工厂模式是我们最常用的实例化对象模式，是用工厂方法代替new操作的一种模式。
    使用工厂模式的好处是，如果你想要更改所实例化的类名等，则只需更改该工厂方法内容即可，不需逐一寻找代码中具体实例化的地方（new处）修改了。为系统结构提供灵活的动态扩展机制，减少了耦合。
 */
interface  people
{
    public function say();
}

/**
 * Class man 继承people的男人类
 */
class man implements people
{
    // 具体实现people的say方法
    public function say()
    {
        echo '我是男人<br>';
    }
}

/**
 * Class women 继承people的女人类
 */
class women implements people
{
    // 具体实现people的say方法
    public function say()
    {
        echo '我是女人<br>';
    }
}

/**
 * Class SimpleFactoty 工厂类
 */
class SimpleFactoty
{
    // 简单工厂里的静态方法-用于创建男人对象
    static function createMan()
    {
        return new man();
    }

    // 简单工厂里的静态方法-用于创建女人对象
    static function createWomen()
    {
        return new women();
    }
}

/**
 * 具体调用
 */
$man = SimpleFactoty::createMan();
$man->say();
$woman = SimpleFactoty::createWomen();
$woman->say();