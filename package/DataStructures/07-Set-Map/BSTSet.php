<?php
/**
 * Created by PhpStorm.
 * User: wlh
 * Date: 2018/11/3
 * Time: 8:45 PM
 */
require_once __DIR__ . "/../06-Binary-Search-Tree/BST.php";
require_once __DIR__ . "/Set.php";

class BSTSet implements Set
{
    private $bst;

    public function __construct()
    {
        $this->bst = new BST();
    }

    function getSize():?int
    {
        return $this->bst->size();
    }

    public function isEmpty():?bool
    {
        return $this->bst->isEmpty();
    }

    public function add($e)
    {
        $this->bst->add($e);
    }

    function contains($e):?bool
    {
        return $this->bst->contains($e);
    }

    public function remove($e)
    {
        return $this->bst->remove($e);
    }
}