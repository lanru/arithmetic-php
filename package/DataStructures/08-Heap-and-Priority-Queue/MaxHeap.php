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

    public function __construct(?int $capacity)
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
}