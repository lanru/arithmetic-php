<?php
/**
 * Created by PhpStorm.
 * User: wlh
 * Date: 2018/11/4
 * Time: 8:24 PM
 */
require_once __DIR__ . "/../02-Arrays/TestArray.php";

class MaxHeap
{
    private $data;

    public function __construct(?int $capacity = 10)
    {
        $this->data = new TestArray($capacity);
    }

    public function size(): int
    {
        return $this->data->getSize();
    }

    public function isEmpty(): bool
    {
        return $this->data->isEmpty();
    }

    // 返回完全二叉树的数组表示中，一个索引所标识的元素的父亲节点的索引
    public function parent(int $index): int
    {
        if ($index == 0) {
            throw  new Exception("index-0 doesn't have parent");
        }
        return ($index - 1) / 2;
    }

    // 返回完全二叉树的数组表示中，一个索引所表示的元素的左孩子节点的索引
    private function leftChild(int $index)
    {
        return $index * 2 + 1;
    }

    private function rightChild(int $index)
    {
        return $index * 2 + 2;
    }

    public function add($e)
    {
        $this->data->addLast($e);
        $this->siftUp($this->data->getSize() - 1);
    }

    private function siftUp(int $k)
    {
        while ($k > 0 && $this->data->get($this->parent($k)) < $this->data->get($k)) {
            $this->data->swap($k, $this->parent($k));
            $k = $this->parent($k);
        }
    }

    public function findMax()
    {
        if ($this->data->getSize() == 0) {
            throw  new Exception("can not findMax when heap is empty;");
        }
        return $this->data->get(0);
    }

    public function extractMax()
    {
        $ret = $this->findMax();
        $this->data->swap(0, $this->data->getSize() - 1);
        $this->data->removeLast();
        $this->siftDown(0);
        return $ret;
    }

    private function siftDown(int $k)
    {
        while ($this->leftChild($k) < $this->data->getSize()) {
            $j = $this->leftChild($k);
            if ($j + 1 < $this->data->getSize() && $this->data->get($j + 1) > $this->data->get($j)) {
                $j = $this->rightChild($k);
            }
            //此时data[j]是leftChild 和rightChild中最大值
            if ($this->data->get($k) >= $this->data->get($j)) {
                break;
            }
            $this->data->swap($k, $j);
            $k = $j;
        }
    }

    public function replace($e)
    {
        $ret = $this->findMax();
        $this->data->set(0, $e);
        $this->siftDown(0);
        return $ret;
    }


    //heapify将任意数组整理成堆的形状
    public function MaxHeap1(Array $arr)
    {
        $this->data = new TestArray(10);
        $this->data->TestArray1($arr);
        for ($i = count($arr) - 1; $i >= 0; $i--) {
            $this->siftDown($i);
        }
    }

}