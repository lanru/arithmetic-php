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
    protected $size;//最后一个有内容的位置

    // 构造函数，传入数组的容量capacity构造Array
    function __construct($capacity)
    {
        $this->data = array_fill(0, $capacity, null);
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

    public function addLast($e)
    {
//        if ($this->size == count($this->data)) {
//            throw  new Exception("illiegal");
//        }
//        $this->data[$this->size] = $e;
//        $this->size++;
        $this->add($this->size, $e);
    }

    public function addFirst($e)
    {
        $this->add(0, $e);
    }

    public function add($index, $e)
    {
        if ($this->size == count($this->data))
            throw  new Exception("ileggal");
        if ($index < 0 || $index > $this->size) {
            throw  new Exception("invalid parameter");
        }
        for ($i = $this->size - 1; $i >= $index; $i--) {
            $this->data[$i + 1] = $this->data[$i];
        }
        $this->data[$index] = $e;
        $this->size++;
    }
}

$array = new TestArray(5);
$count = $array->getCapacity();
$array->addLast(12);
$array->addFirst(1);
echo $array;
