<?php
/**
 * Created by PhpStorm.
 * User: wlh
 * Date: 2018/10/26
 * Time: 10:13 PM
 */

class BSTNode
{
    public $e;
    public $left, $right;

    public function __construct($e = null)
    {
        $this->e = $e;
        $this->left = null;
        $this->right = null;
    }

    public function __toString()
    {
        $str = "{$this->e}";
        return $str;
    }
}