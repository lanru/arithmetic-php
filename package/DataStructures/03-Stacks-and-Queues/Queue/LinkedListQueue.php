<?php
/**
 * Created by PhpStorm.
 * User: wlh
 * Date: 2018/10/26
 * Time: 10:06 PM
 */
require_once "../Node.php";

class LinkedListQueue implements Queue
{
    private $head;
    private $tail;
    private $size;

    public function __construct()
    {
        $this->head = null;
        $this->tail = null;
        $this->size = 0;

    }

    function getSize()
    {
        return $this->size;
    }

    function isEmpty()
    {
        return $this->size == 0;
    }

    function enqueue($e)
    {
        if ($this->tail == null) {
            $this->tail = new Node();
            $this->head = $this->tail;
        } else {
            $this->tail->next = new Node($e);
            $this->tail = $this->tail->next;
        }
        $this->size++;
    }

    function dequeue()
    {
        if ($this->isEmpty()) {
            throw  new Exception("empty");
        }
        $retNode = $this->head;
        $this->head = $this->head->next;
        $retNode->next = null;
        if ($this->head == null) {
            $this->tail = null;
        }
        $this->size--;
        return $retNode->e;
    }


}