<?php
/**
 * Created by PhpStorm.
 * User: wlh
 * Date: 2018/11/1
 * Time: 11:16 PM
 */

require_once __DIR__ . "/BSTSet.php";


$bst = new BSTSet();
$words = ["a", "bb", "cc", "dd","bb"];

foreach ($words as $item) {
    $bst->add($item);
}
$size = $bst->getSize();
echo $size;

