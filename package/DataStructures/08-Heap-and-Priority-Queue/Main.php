<?php
/**
 * Created by PhpStorm.
 * User: wlh
 * Date: 2018/11/6
 * Time: 12:04 AM
 */
require_once __DIR__ . "/MaxHeap.php";
$n = 100;
$maxHeap = new MaxHeap($n);

for ($i = 0; $i < $n; $i++) {
    $rand = rand();
    $maxHeap->add($rand);
}

$arr = [];
for ($i = 0; $i < $n; $i++) {
    $arr[] = $maxHeap->extractMax();
}

for ($i = 1; $i < $n; $i++) {
    if ($arr[$i - 1] < $arr[$i]) {
        throw  new Exception("Error Occurence");
        break;
    }
}
//var_dump($arr);
echo "Test MaxHeap completed";

