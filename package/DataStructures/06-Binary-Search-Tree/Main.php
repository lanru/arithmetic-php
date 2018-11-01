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
for ($i = 0; $i < count($nums); $i++) {
    $bst->add($nums[$i]);
}

$bst->preOrder();
