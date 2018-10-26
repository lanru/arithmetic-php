<?php
/**
 * Created by PhpStorm.
 * User: wlh
 * Date: 2018/10/26
 * Time: 10:13 PM
 */

class Node
{
    public $e;
    public $next;

    public function __construct($e = null, $next = null)
    {
        $this->e = $e;
        $this->next = $next;
    }

    public function __toString()
    {
        $str = "{$this->e}";
        return $str;
    }
}