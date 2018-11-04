<?php
/**
 * Created by PhpStorm.
 * User: wlh
 * Date: 2018/11/4
 * Time: 10:53 AM
 */

require_once __DIR__ . "/../Map.php";
require_once __DIR__ . "/Node.php";

class LinkedListMap implements Map
{
    private $size;
    private $dummyHead;

    public function __construct()
    {
        $this->dummyHead = new Node(null, null, null);
        $this->size = 0;
    }

    function getSize(): int
    {
        return $this->size;
    }

    function isEmpty(): bool
    {
        return $this->size == 0;
    }

    public function getNode($key):?Node
    {
        $cur = $this->dummyHead->next;
        while ($cur != null) {
            if ($cur->key == $key) {
                return $cur;
            }
            $cur = $cur->next;
        }
        return null;
    }

    function contains($K): bool
    {
        return $this->getNode($K) != null;
    }

    function get($k)
    {
        $node = $this->getNode($k);
        return $node == null ? null : $node->value;
    }

    function add($key, $value)
    {
        $node = $this->getNode($key);
        if ($node == null) {
            $this->dummyHead->next = new Node($key, $value, $this->dummyHead->next);
            $this->size++;
        } else {
            $node->value = $value;
        }
    }

    function set($k, $v)
    {
        $node = $this->getNode($k);
        if ($node == null) {
            throw  new Exception("doesn't not exist!");
        }
        $node->value = $v;
    }

    function remove($key)
    {
        $prev = $this->dummyHead;
        while ($prev->next != null) {
            if ($prev->next->key == $key) {
                break;
            }
            $prev = $prev->next;
        }

        if ($prev->next != null) {
            $delNode = $prev->next;
            $prev->next = $delNode->next;
            $delNode->next = null;
            return $delNode->next->value;
        }
        return null;
    }
}