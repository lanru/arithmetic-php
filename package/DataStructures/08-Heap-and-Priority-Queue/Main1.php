<?php
/**
 * Created by PhpStorm.
 * User: wlh
 * Date: 2018/11/6
 * Time: 12:04 AM
 */
require_once __DIR__ . "/MaxHeap.php";
require_once __DIR__ . "/../helper.php";
function testHeap(Array $testData, bool $isHeapify)
{
    $startTime = getMillisecond();

    if ($isHeapify) {
        $maxHeap = new MaxHeap();
        $maxHeap->MaxHeap1($testData);
    } else {
        $maxHeap = new MaxHeap();
        foreach ($testData as $i) {
            $maxHeap->add($i);
        }
    }
    for ($i = 0; $i < count($testData); $i++) {
        $arr[] = $maxHeap->extractMax();
    }
    for ($i = 0; $i < count($testData); $i++) {
        if ($arr[$i - 1] < $arr[$i]) {
            throw  new Exception("Error");
        }
    }

    $endTime = getMillisecond();
    $timeTake = $endTime - $startTime;
    return $timeTake;
}

//var_dump($arr);
$n = 1000000;
$testData = [];
for ($i = 0; $i < $n; $i++) {
    $rand = rand();
    $testData[] = $rand;
}
$time1 = testHeap($testData, false);
echo "without heapify:" . $time1;
$time2 = testHeap($testData, true);
echo "without heapify:" . $time2;


