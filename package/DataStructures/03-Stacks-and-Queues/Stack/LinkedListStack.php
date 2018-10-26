<?php
/**
 * Created by PhpStorm.
 * User: wlh
 * Date: 2018/10/26
 * Time: 12:12 AM
 */
require_once "Stack.php";
require_once "../../04-Linked-List/LinkedList.php";

class LinkedListStack implements Stack
{
    private $list;

    public function __construct()
    {
        $this->list = new LinkedList();
    }

    function getSize()
    {
        return $this->list->getSize();
    }

    function push($e)
    {
        $this->list->addFirst($e);
    }

    function pop()
    {
        return $this->list->removeFirst();
    }

    function isEmpty()
    {
        return $this->list->isEmpty();
    }

    function peek()
    {
        return $this->list->getFirst();
    }

    public function __toString()
    {
        $res = "Stack top:";
        $res .= $this->list;
        return $res;
    }

}