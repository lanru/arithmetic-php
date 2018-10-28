<?php
/**
 * Created by PhpStorm.
 * User: wlh
 * Date: 2018/10/28
 * Time: 7:25 PM
 */
function sum(array $arr)
{
    return subsum($arr, 0);
}

function subsum(?array $arr, ?int $l)
{
    if ($l == count($arr)) { //求解最基本问题
        return 0;
    }
    $x = subsum($arr, $l + 1);
    $res = $arr[$l] + $x;
    return $res;
    // 把原问题转化成更小的问题
}

$nums = [6,10];
$num = sum($nums);
echo $num;