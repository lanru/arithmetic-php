<?php
/**
 * Created by PhpStorm.
 * User: wlh
 * Date: 2018/10/26
 * Time: 10:06 PM
 */
require_once "../Node.php";
require_once "./Queue.php";

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
            $this->tail = new Node($e);
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

    function getFront()
    {
        if ($this->isEmpty()) {
            throw  new Exception("empty");
        }
        return $this->head->e;
    }

    public function __toString()
    {
        $res = "Queue: front ";
        $cur = $this->head;
        while ($cur != null) {
            $res .= $cur . "->";
            $cur = $cur->next;
        }
        $res .= "NULL tail \n";
        return $res;
    }
}

$queue = new LinkedListQueue(10);
for ($i = 0; $i < 10; $i++) {
    $queue->enqueue($i);
    echo $queue;
    if ($i % 3 == 2) {
        $queue->dequeue();
        echo $queue;
    }
}