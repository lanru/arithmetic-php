<?php

/**
 * Created by PhpStorm.
 * User: wlh
 * Date: 2018/10/22
 * Time: 11:00 PM
 */

require_once "../02-Arrays/TestArray.php";

interface Queue
{
    function getSize();

    function isEmpty();

    function enqueue($e);

    function dequeue();

    function getFront();
}

class ArrayQueue implements Queue
{
    protected $array;


    // 构造函数，传入数组的容量capacity构造Array
    function __construct($capacity)
    {
        $this->array = new TestArray(10);
    }

    function getSize()
    {
        return $this->array->getSize();
    }

    public function isEmpty()
    {
        return $this->array->isEmpty();
    }

    public function getCapacity()
    {
        return $this->array->getCapacity();
    }

    public function enqueue($e)
    {
        $this->array->addLast($e);
    }

    public function dequeue()
    {
        return $this->array->removeFirst();
    }

    public function getFront()
    {
        return $this->array->getFirst();
    }

    public function toString()
    {
        $size = $this->array->getSize();
        $res = "Queue: front [";
        for ($i = 0; $i < $size; $i++) {
            $res .= $this->array->get($i);
            if ($i != $this->array->getSize() - 1) {
                $res .= ", ";
            }
        }
        $res .= "] tail \n";
        return $res;
    }
}


$queue = new ArrayQueue(10);
for ($i = 0; $i < 10; $i++) {
    $queue->enqueue($i);
    $str = $queue->toString();
    echo $str;
    if ($i % 3 == 2) {
        $queue->dequeue();
        $str = $queue->toString();
        echo $str;
    }
}



