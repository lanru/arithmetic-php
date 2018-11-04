<?php
/**
 * Created by PhpStorm.
 * User: wlh
 * Date: 2018/11/4
 * Time: 10:18 AM
 */

class Node
{
    public $key;
    public $value;
    public $next;

    public function __construct($key = null, $value = null, ?Node $next)
    {
        $this->key = $key;
        $this->value = $value;
        $this->next = $next;
    }

    public function __toString()
    {
        return $this->key . ":" . $this->value;
    }

}