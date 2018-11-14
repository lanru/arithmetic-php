<?php
/**
 * Created by PhpStorm.
 * User: wlh
 * Date: 2018/11/14
 * Time: 11:50 PM
 */
require_once __DIR__ . "/MaxHeap.php";
require_once __DIR__ . "/../03-Stacks-and-Queues/Queue/Queue.php";

class PriorityQueue implements Queue
{
    private $maxHeap;

    public function __construct()
    {
        $this->maxHeap = new MaxHeap();
    }

    public function getSize()
    {
        return $this->maxHeap->size();
    }

    function isEmpty()
    {
        return $this->maxHeap->isEmpty();
    }

    public function getFront()
    {
        return $this->maxHeap->findMax();
    }

    public function enqueue($e)
    {
        $this->maxHeap->add($e);
    }

    public function dequeue()
    {
        return $this->maxHeap->extractMax();
    }
}