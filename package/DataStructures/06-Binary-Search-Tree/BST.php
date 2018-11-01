<?php
/**
 * Created by PhpStorm.
 * User: wlh
 * Date: 2018/11/1
 * Time: 10:28 PM
 */
require_once "./Node.php";

class BST
{
    private $root;
    private $size;

    public function __construct()
    {
        $this->root = null;
        $this->size = 0;
    }

    public function size()
    {
        return $this->size;
    }

    public function isEmpty()
    {
        return $this->size == 0;
    }

    public function add(int $e)
    {
        $this->root = $this->add1($this->root, $e);
    }

    private function add1(?Node $node, int $e)
    {
        if ($node == null) {
            $this->size++;
            return new Node($e);
        }
        if ($e < $node->e) {
            $node->left = $this->add1($node->left, $e);
        } elseif ($e > $node->e) {
            $node->right = $this->add1($node->right, $e);
        }
        return $node;
    }

    public function contains($e)
    {
        return $this->contains1($this->root, $e);
    }

    private function contains1(?Node $node, $e)
    {
        if ($node == null) {
            return false;
        }
        if ($e == $node->e) {
            return true;
        } elseif ($e < $node->e) {
            return $this->contains1($node->left, $e);
        } else {
            return $this->contains1($node->right, $e);
        }
    }
}