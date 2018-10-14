<?php
/**
 * Created by PhpStorm.
 * User: wlh
 * Date: 2018/10/14
 * Time: 8:08 PM
 */
/*
    题目
    从上往下打印出二叉树的每个节点，同层节点从左至右打印。
    题解
    每层树从左到右打印，所以需要将节点的左右子树存起来，因为先进先出，所以用队列。
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

function PrintFromTopToBottom($root)
{
    $queueVal = array();
    $queueNode = array();
    if ($root == NULL)
        return $queueVal;
    array_push($queueNode, $root);
    while (!empty($queueNode)) {
        $node = array_shift($queueNode);
        if ($node->left != NULL)
            array_push($queueNode, $node->left);
        if ($node->right != NULL)
            array_push($queueNode, $node->right);
        array_push($queueVal, $node->val);
    }
    var_dump($queueVal);
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
/*
 *   1
 *  2 3
 * 4 5 6 7
 */
PrintFromTopToBottom($a);