<?php
/**
 * Created by PhpStorm.
 * User: wlh
 * Date: 2018/10/26
 * Time: 9:08 PM
 */
// 毫秒级时间戳
require_once "ArrayStack.php";
require_once "LinkedListStack.php";
function getMillisecond()
{
    list($t1, $t2) = explode(' ', microtime());
    return (float)sprintf('%.0f', (floatval($t1) + floatval($t2)) * 1000);
}

function testStack($stack, $opCount)
{
    $startTime = getMillisecond();
    for ($i = 0; $i < $opCount; $i++) {
        $value = rand();
        $stack->push($value);
    }

    for ($i = 0; $i < $opCount; $i++) {
        $stack->pop();
    }
    $endTime = getMillisecond();
    return $endTime - $startTime;
}

$opCount = 100000;
$arrayStack = new ArrayStack();
$time1 = testStack($arrayStack, $opCount);
echo "ArrayStack,time:{$time1}\n";

$linkStack = new LinkedListStack();
$time2 = testStack($linkStack,$opCount);
echo "LinkedStack,time:{$time2}";