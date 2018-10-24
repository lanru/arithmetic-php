<?php

/**
 * Created by PhpStorm.
 * User: wlh
 * Date: 2018/10/24
 * Time: 10:31 PM
 */
interface Queue
{
    function getSize();

    function isEmpty();

    function enqueue($e);

    function dequeue();

    function getFront();
}

class LoopQueue implements Queue
{
    protected $data;
    protected $front;
    protected $tail;
    protected $size;

    public function __construct($capacity)
    {
        $capacity_new = $capacity + 1;
        $this->data = array_fill(0, $capacity_new,
            null);
        $this->front = 0;   //队列中第一个元素
        $this->tail = 0;    //队列中最后一个元素
        $this->size = 0;    //队列中非元素个数
    }

    public function getCapacity()
    {
        return $this->getLength() - 1;
    }

    public function isEmpty()
    {
        return $this->front == $this->tail;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function resize($newCapacity)
    {
        $length = $this->getLength();
        $newData = array_fill(0, $newCapacity + 1,
            null);
        for ($i = 0; $i < $this->size; $i++) {
            $index = ($i + $this->front) % $length;
            $newData[$i] = $this->data[$index];
        }
        $this->data = $newData;
        $this->front = 0;
        $this->tail = $this->size;
    }

    public function getLength()
    {
        return count($this->data);
    }

    public function enqueue($e)
    {
        $length = $this->getLength();
        if (($this->tail + 1) % $length == $this->front) {
            $this->resize($this->getCapacity() * 2);
            $length = $this->getLength(); //重新计算了
        }
        $this->data[$this->tail] = $e;
        $this->tail = ($this->tail + 1) % $length;
        $this->size++;
    }

    public function dequeue()
    {
        $length = $this->getLength();
        if ($this->isEmpty()) {
            throw  new Exception("Cannot dequeue from an empty queue");
        }
        $ret = $this->data[$this->front];
        $this->data[$this->front] = null;
        $this->front = ($this->front + 1) % $length;
        $this->size--;
        if ($this->size < ($this->getCapacity() / 4) && $this->getCapacity() / 2 != 0) {
            $this->resize($this->getCapacity() / 2);
        }
        return $ret;
    }

    public function getFront()
    {
        if ($this->isEmpty()) {
            throw  new Exception("empty");
        }
        return $this->data[$this->front];
    }

    public function toString()
    {
        $length = $this->getLength();
        $capacity = $this->getCapacity();
        $result = "Queue:size={$this->size},capacity={$capacity}\n";
        $result .= "front [";
        for ($i = $this->front; $i != $this->tail; $i = ($i + 1) % $length) {
            $result .= $this->data[$i];
            if (($i + 1) % $length != $this->tail) {
                $result .= ",";
            }
        }
        $result .= "] tail \n";
        return $result;
    }
}

$queue = new LoopQueue(10);
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