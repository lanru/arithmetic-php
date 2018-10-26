<?php
/**
 * Created by PhpStorm.
 * User: wlh
 * Date: 2018/10/25
 * Time: 8:05 AM
 */
require_once "ArrayQueue.php";
require_once "LoopQueue.php";
// 毫秒级时间戳
function getMillisecond() {
    list($t1, $t2) = explode(' ', microtime());
    return (float)sprintf('%.0f',(floatval($t1)+floatval($t2))*1000);
}
function testQueue($count)
{
    $startTime = getMillisecond();
    $q = new LoopQueue(10);
    for ($i = 0; $i < $count; $i++) {
        $q->enqueue($i);
    }
    for ($i = 0; $i < $count; $i++) {
        $q->dequeue();
    }
    $endTime = getMillisecond();
    $time = $endTime - $startTime;
    echo "used time:$time ms";
}

$count = 100000;
testQueue($count);

