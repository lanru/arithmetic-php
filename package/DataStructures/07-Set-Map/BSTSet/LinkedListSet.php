<?php
/**
 * Created by PhpStorm.
 * User: wlh
 * Date: 2018/11/3
 * Time: 9:27 PM
 */
require_once __DIR__ . "/../Set.php";
require_once __DIR__ . "/../../04-Linked-List/LinkedList.php";

class LinkedListSet implements Set
{
    private $list;

    public function __construct()
    {
        $this->list = new LinkedList();
    }

    public function getSize():?int
    {
        return $this->list->getSize();
    }

    function isEmpty():?bool
    {
        return $this->list->isEmpty();
    }

    function contains($e):?bool
    {
        return $this->list->contains($e);
    }

    function add($e)
    {
        if (!$this->list->contains($e)) {
            $this->list->addFirst($e);
        }
    }

    function remove($e)
    {
        $this->list->remove($e);
    }


}