<?php
/**
 * Created by PhpStorm.
 * User: wlh
 * Date: 2018/10/25
 * Time: 8:05 AM
 */
require_once "ArrayQueue.php";
require_once "LoopQueue.php";

function testQueue($count)
{
    $startTime = time();
    $q = new ArrayQueue(10);
    for ($i = 0; $i < $count; $i++) {
        $q->enqueue($i);
    }
    for ($i = 0; $i < $count; $i++) {
        $q->dequeue();
    }
    $endTime = time();
    $time = ($endTime - $startTime);
    echo "used time:$time s";
}

$count = 10000;
testQueue($count);

