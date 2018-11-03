<?php
/**
 * Created by PhpStorm.
 * User: wlh
 * Date: 2018/11/1
 * Time: 11:16 PM
 */

require_once "./BST.php";

$bst = new BST();
$nums = [5, 3, 6, 8, 4, 2];
//
//     5
//   3   6
// 2  4   8
//

for ($i = 0; $i < count($nums); $i++) {
    $bst->add($nums[$i]);
}

//前序遍历
//$bst->preOrder();
//echo "\n";
//echo $bst;

//中序遍历
//$bst->inOrder();

//后续遍历
//$bst->postOrder();
//非递归前序遍历
//$bst->preOrderNR();
//层序遍历
//$bst->levelOrder();
//最小元素
$min = $bst->minimum();
echo $min;