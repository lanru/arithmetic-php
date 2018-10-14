<?php

/**
 * Created by PhpStorm.
 * User: wlh
 * Date: 2018/10/14
 * Time: 10:19 PM
 * 题目
 * 给定一个二叉树和其中的一个结点，请找出中序遍历顺序的下一个结点并且返回。注意，树中的结点不仅包含左右子结点，同时包含指向父结点的指针。
 * 题解
 * 分为三种情况：
 * 1、pNode有右子树时，则下一个应该是pNode的右子树的最左节点。
 * 2、pNode没有右子树，且pNode为它的父节点的左子树，则它的下一个节点为PNode的父节点。
 * 3、pNode没有右子数，且pNode为它的父节点的右子树，则需要找到左子树的父节点。
 */
class TreeLinkNode
{
    var $val;
    var $left = NULL;
    var $right = NULL;
    var $next = NULL;

    function __construct($x)
    {
        $this->val = $x;
    }
}

function GetNext($pNode)
{
    if (!$pNode) {
        return null;
    }
    if ($pNode->right != null) {
        $pNode = $pNode->right;
        while ($pNode->left != null) {
            $pNode = $pNode->left;
        }
        return $pNode;
    }
    while ($pNode->next != null) {
        if ($pNode->next->left == $pNode)
            return $pNode->next;
        $pNode = $pNode->next;

    }
    return null;
}

$a = new TreeLinkNode("A");
$b = new TreeLinkNode("B");
$c = new TreeLinkNode("C");
$d = new TreeLinkNode("D");
$e = new TreeLinkNode("E");
$f = new TreeLinkNode("F");
$a->left = $b;
$a->right = $c;
$b->next = $a;
$b->left = $d;
$b->right = $e;
$d->next = $b;
$e->next = $b;
$c->left = $f;
$c->next = $a;
$f->next = $c;
$result = GetNext($c);
if ($result) {
    echo $result->val;
} else {
    echo "找不到";
}


