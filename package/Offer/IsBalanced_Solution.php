<?php

/**
 * Created by PhpStorm.
 * User: wlh
 * Date: 2018/10/14
  剑指offer-判断平衡二叉树
  题目
  输入一棵二叉树，判断该二叉树是否是平衡二叉树。
  题解
  两个比较重要的部分：首先左右子树相差不大于1。然后所有子树都要为平衡二叉树
 */

class TreeNode
{
    var $val;
    var $left = NULL;
    var $right = NULL;

    function __construct($val)
    {
        $this->val = $val;
    }
}

function IsBalanced_Solution($pRoot)
{
    // write code here
    if ($pRoot == null) {
        return true;
    }
    $left = TreeDepth($pRoot->left);
    $right = TreeDepth($pRoot->right);
    $dif = abs($left - $right);
    if ($dif > 1) {
        return false;
    }
    return IsBalanced_Solution($pRoot->left) && IsBalanced_Solution($pRoot->right);
}

function TreeDepth($root)
{
    if (!$root || count($root) == 0) {
        return 0;
    }
    $left = TreeDepth($root->left);
    $right = TreeDepth($root->right);
    return max($left, $right) + 1;
}

$a = new TreeNode(1);
$b = new TreeNode(2);
$c = new TreeNode(3);
$d = new TreeNode(4);
$e = new TreeNode(5);
$f = new TreeNode(6);
$g = new TreeNode(7);
$a->left = $b;
$a->right = $c;
$b->left = $d;
$b->right = $e;
$c->left = $f;
$c->right = $g;
$result = IsBalanced_Solution($a);
echo $result;



