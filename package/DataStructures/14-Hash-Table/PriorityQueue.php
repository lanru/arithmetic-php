<?php
/**
 * Created by PhpStorm.
 * User: wlh
 * Date: 2018/11/29
 * Time: 9:53 PM
 */

require __DIR__ . "/../03-Stacks-and-Queues/Queue/Queue.php";
require __DIR__ . "/../08-Heap-and-Priority-Queue/MaxHeap.php";

class PriorityQueue implements Queue
{
    private $maxHeap;

    public function __construct()
    {
        $this->maxHeap = new MaxHeap();
    }

    function getSize()
    {
        return $this->maxHeap->size();
        // TODO: Implement getSize() method.
    }

    function isEmpty()
    {
        return $this->maxHeap->isEmpty();
    }

    function getFront()
    {
        return $this->maxHeap->findMax();
    }

    function enqueue($e)
    {
        $this->maxHeap->add($e);
    }

    function dequeue()
    {
        return $this->maxHeap->extractMax();
    }
}