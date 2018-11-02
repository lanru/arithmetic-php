<?php
/**
 * Created by PhpStorm.
 * User: wlh
 * Date: 2018/10/26
 * Time: 12:09 AM
 */

require_once __DIR__."/../../02-Arrays/TestArray.php";

class ArrayStack
{
    protected $array;

    public function __construct()
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

    public function __toString()
    {
        $size = $this->array->getSize();
        $res = "Stack: [";
        for ($i = 0; $i < $size; $i++) {
            $res .= $this->array->get($i);
            if ($i != $this->array->getSize() - 1) {
                $res .= ", ";
            }
        }
        $res .= "] top \n";
        return $res;
    }
}