<?php
/**
 * Created by PhpStorm.
 * User: wlh
 * Date: 2018/11/4
 * Time: 11:26 AM
 */

require_once __DIR__ . "/../Map.php";
require_once __DIR__ . "/BSTNode.php";

//基于二分搜索树实现的映射
class BSTMap implements Map
{
    private $root;
    private $size;

    public function __construct()
    {
        $this->root = null;
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

    function add($k, $v)
    {
        $this->root = $this->add1($this->root, $k, $v);
    }

    function add1(?BSTNode $node, $k, $v)
    {
        if ($node == null) {
            $this->size++;
            return new BSTNode($k, $v);
        }
        if ($k < $node->key) {
            $node->left = $this->add1($node->left, $k, $v);
        } elseif ($k > $node->key) {
            $node->right = $this->add1($node->right, $k, $v);
        } else {
            $node->value = $v;
        }
        return $node;
    }

    private function getNode(?BSTNode $node, $key)
    {
        if ($node == null) {
            return null;
        }
        if ($key == $node->key) {
            return $node;
        } elseif ($key < $node->key) {
            return $this->getNode($node->left, $key);
        } else {
            return $this->getNode($node->right, $key);
        }
    }

    function contains($K): bool
    {
        return $this->getNode($this->root, $K) != null;
    }

    function get($k)
    {
        $node = $this->getNode($this->root, $k);
        return $node == null ? null : $node->value;
    }

    function set($k, $v)
    {
        $node = $this->getNode($this->root, $k);
        if ($node == null) {
            throw  new Exception("doesn't exist");
        }
        $node->value = $v;
    }

    function remove($k)
    {
        $node = $this->getNode($this->root, $k);
        if ($node != null) {
            $this->root = $this->remove1($this->root, $k);
            return $node->value;
        }
        return null;
    }

    private function minimum1(?BSTNode $node):?BSTNode
    {
        if ($node->left == null) {
            return $node;
        }
        return $this->minimum1($node->left);
    }

    private function removeMin1(?BSTNode $node)
    {
        if ($node->left == null) {
            $rightNode = $node->right;
            $node->right = null;
            $this->size--;
            return $rightNode;
        }
        $node->left = $this->removeMin1($node->left);
        return $node;
    }

// 删除以node为根的二分搜索树中键为key的节点，递归算法
// 返回删除节点后的二分搜索树的根
    function remove1(?BSTNode $node, $key)
    {
        if ($node == null) {
            return null;
        }
        if ($key < $node->key) {
            $node->left = $this->remove1($node->left, $key);
            return $node;
        } elseif ($key > $node->key) {
            $node->right = $this->remove1($node->right, $key);
            return $node;
        } else {
            $successor = $this->minimum1($node->right);
            $successor->right = $this->removeMin1($node->right);
            $successor->left = $node->left;
            $node->left = $node->right = null;
            $this->size--;
            return $successor;
        }

    }
}