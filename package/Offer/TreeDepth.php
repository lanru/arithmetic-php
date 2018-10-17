<?php
/**
 * Created by PhpStorm.
 * User: wlh
 * Date: 2018/10/17
    题目
    输入一棵二叉树，求该树的深度。从根结点到叶结点依次经过的结点（含根、叶结点）形成树的一条路径，最长路径的长度为树的深度。

    题解
    两种方法，一种是递归，深度优先遍历二叉树。另一种是非递归，就是层次遍历二叉树的方法，加上计算深度。
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

//非递归
function TreeDepth($pRoot)
{
    if ($pRoot == NULL)
        return 0;
    $count = 0;
    $nextCount = 1;
    $depth = 0;

    $queue = [];
    array_push($queue, $pRoot);

    while (!empty($queue)) {
        $count++;
        $val = array_shift($queue);
        if ($val->left)
            array_push($queue, $val->left);
        if ($val->right)
            array_push($queue, $val->right);
        if ($count == $nextCount) {
            $count = 0;
            $nextCount = count($queue);
            $depth++;
        }
    }
    return $depth;
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
$depth = TreeDepth($a);