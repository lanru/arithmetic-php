<?php
/**
 * Created by PhpStorm.
 * User: wlh
 * Date: 2018/11/4
 * Time: 10:18 AM
 */

class BSTNode
{
    public $key;
    public $value;
    public $left;
    public $right;

    public function __construct($key = null, $value = null)
    {
        $this->key = $key;
        $this->value = $value;
        $this->left = null;
        $this->right = null;
    }

    public function __toString()
    {
        return $this->key . ":" . $this->value;
    }

}