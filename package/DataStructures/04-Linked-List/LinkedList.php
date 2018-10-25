<?php

/**
 * Created by PhpStorm.
 * User: wlh
 * Date: 2018/10/25
 * Time: 8:35 AM
 */
class Node
{
    public $e;
    public $next;

    public function __construct($e = null, $next = null)
    {
        $this->e = $e;
        $this->next = $next;
    }

    public function __toString()
    {
        $str = "value:{$this->e}";
        return $str;
    }
}

class LinkedList
{
    protected $head;
    protected $size;

    public function __construct()
    {
        $this->head = null;
        $this->size = 0;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function isEmpty()
    {
        return $this->size == 0;
    }

    // 在链表头添加元素e
    public function addFirst($e)
    {
        $node = new Node($e);
        $node->next = $this->head;
        $this->head = $node;
        $this->size++;
    }

    public function add($index, $e)
    {
        if ($index < 0 || $index > $this->size) {
            throw  new Exception("Add failed,Illegal index");
        }
        if ($index == 0) {
            $this->addFirst($e);
        } else {
            $prev = $this->head;
            for ($i = 0; $i < $index - 1; $i++) {
                $prev = $prev->next;
            }
            $node = new Node($e);
            $node->next = $prev->next;
            $prev->next = $node;
            $this->size++;
        }
    }

    public function addLast($e)
    {
        $this->add($this->size,$e);
    }
}