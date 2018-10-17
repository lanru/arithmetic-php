<?php
/**
 * Created by PhpStorm.
 * User: wlh
 * Date: 2018/10/17
 * 题目
 * 统计一个数字在排序数组中出现的次数。
 *
 * 题解
 * 1、既然是排序数组，使用二分查找是效率最高的。找到之后再向两侧拓展一下。
 */
function GetNumberOfK($data, $k)
{
    if (count($data) == 0) {
        return 0;
    }
    $index = 0;
    $low = 0;
    $high = count($data) - 1;
    $middle = 0;
    //二分查找找到k的index
    while ($low <= $high) {
        $middle = ($high + $low) >> 1;
        if ($data[$middle] == $k) {
            $index = $middle;
            break;
        } else if ($data[$middle] > $k) {
            $high = $middle - 1;
        } else {
            $low = $middle + 1;
        }
        $index = -1;
    }
    // console.log(index);
    // 如果没找到
    if ($index == -1) {
        return 0;
    }
    //找到了 分别往左右查找边界
    $start = $index;
    $end = $index;
    $count = 0;
    while ($data[$start] == $k) {
        $count++;
        $start--;
    }
    while ($data[$end] == $k) {
        $count++;
        $end++;
    }
    return $count - 1;
}

$data = [1, 2, 34, 5, 6, 7, 9];
$count = GetNumberOfK($data, 5);
echo $count;