<?php

/**
 * Created by PhpStorm.
 * User: wlh
 * Date: 2018/10/14
 * 平衡二叉树
    平衡二叉搜索树（Self-balancing binary search tree）又被称为AVL树（有别于AVL算法），且具有以下性质：它是一 棵空树或它的左右两个子树的高度差的绝对值不超过1，并且左右两个子树都是一棵平衡二叉树。平衡二叉树的常用实现方法有红黑树、AVL、替罪羊树、Treap、伸展树等。 最小二叉平衡树的节点总数的公式如下 F(n)=F(n-1)+F(n-2)+1 这个类似于一个递归的数列，可以参考Fibonacci(斐波那契)数列，1是根节点，F(n-1)是左子树的节点数量，F(n-2)是右子树的节点数量。
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



