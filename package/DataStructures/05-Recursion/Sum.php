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

function subsum(array $arr, $l)
{
    if ($l == count($arr)) { //求解最基本问题
        return 0;
    }
    return $arr[$l] + subsum($arr, $l + 1);
    // 把原问题转化成更小的问题
}
$nums = [1, 2, 3, 4, 5, 6, 7, 8];
$num = sum($nums);
echo $num;