<?php

/**
 * Created by PhpStorm.
 * User: wlh
 * Date: 2018/10/22
 * Time: 11:00 PM
 */
class TestArray
{
    protected $data;
    protected $size;

    // 构造函数，传入数组的容量capacity构造Array
    function __construct($capacity)
    {
        $this->data = array_fill(0, $capacity, 0);
        $this->size = 0;
    }

    // 获取数组的容量
    public function getCapacity()
    {
        return count($this->data);
    }

    // 获取数组中的元素个数
    public function getSize()
    {
        return $this->size;
    }

    // 返回数组是否为空
    public function isEmpty()
    {
        return $this->size == 0;
    }
}

$test = new TestArray(5);
$count = $test->getCapacity();
echo $count;
