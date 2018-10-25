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
    protected $dummyHead;
    protected $size;

    public function __construct()
    {
        $this->dummyHead = new Node(null, null);
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
        $this->add(0, $e);
    }

    public function add($index, $e)
    {
        if ($index < 0 || $index > $this->size) {
            throw  new Exception("Add failed,Illegal index");
        }
        $prev = $this->dummyHead;
        for ($i = 0; $i < $index; $i++) {
            $prev = $prev->next;
        }
        $node = new Node($e);
        $node->next = $prev->next;
        $prev->next = $node;
        $this->size++;
    }

    public function addLast($e)
    {
        $this->add($this->size, $e);
    }

    // 获取链表第index(0~based)个位置的元素
    // 在链表中不是一个常用的操作，练习用:
    public function get($index)
    {
        if ($index < 0 || $index >= $this->size) {
            throw  new Exception("异常操作");
        }
        $cur = $this->dummyHead->next;
        for ($i = 0; $i < $index; $i++) {
            $cur = $cur->next;
        }
        return $cur->e;
    }

    // 获得链表的第一个元素
    public function getFirst()
    {
        return $this->get(0);
    }

    public function getLast()
    {
        return $this->get($this->size - 1);
    }

    // 修改链表的第index(0~based)个位置的元素为e
    // 在链表中不是一个常用的操作，练习用
    public function set($index, $e)
    {

    }
}