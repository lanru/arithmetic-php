<?php

/**
 * Created by PhpStorm.
 * User: wlh
 * Date: 2018/10/22
 * Time: 11:00 PM
 */
require_once "../02-Arrays/TestArray.php";

interface  stack
{
    function getSize();

    function isEmpty();

    function push($e);

    function pop();

    function peek();
}

class ArrayStack implements stack
{
    protected $array;

    public function __construct($capacity)
    {
        $this->array = new TestArray(10);
    }

    public function getSize()
    {
        // TODO: Implement getSize() method.
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

    public function push($e)
    {
        $this->array->addLast($e);
    }

    public function pop()
    {
        return $this->array->removeLast();
    }

    public function peek()
    {
        return $this->array->getLast();
    }

    public function toString()
    {
        $res = "Stack: [";
        for ($i = 0; $i < $this->array->getSize(); $i++) {
            $res .= $this->array->get($i);
            if ($i != $this->array->getSize() - 1) {
                $res .= ", ";
            }
        }
        $res .= "] top";
        return $res;
    }
}