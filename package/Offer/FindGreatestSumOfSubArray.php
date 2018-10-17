<?php
/**
 * Created by PhpStorm.
 * User: wlh
 * Date: 2018/10/17
 * 题目
 * HZ偶尔会拿些专业问题来忽悠那些非计算机专业的同学。今天测试组开完会后,他又发话了:在古老的一维模式识别中,常常需要计算连续子向量的最大和,当向量全为正数的时候,问题很好解决。但是,如果向量中包含负数,是否应该包含某个负数,并期望旁边的正数会弥补它呢？例如:{6,-3,-2,7,-15,1,2,2},连续子向量的最大和为8(从第0个开始,到第3个为止)。你会不会被他忽悠住？(子向量的长度至少是1)
 *
 * 题解
 * 还是比较简单的。保存一个当前最大的数字。设置一个当前值，如果当前值为负数（也就是前面数字和为负数），则当前值重置为当前数字（因为该数字加上负数肯定该前数字小。）
 * 还有一点需要注意的是最大数字初始化不能是0，因为有可能最大和为负数，所以可以初始化为array[0]，
 */
function FindGreatestSumOfSubArray($array)
{
    if (count($array) == 0 || $array == null) {
        return 0;
    }
    $greateSum = $array[0];
    $curSum = 0;

    $len = count($array);
    for ($i = 0; $i < $len; $i++) {
        if ($curSum <= 0) {
            $curSum = $array[$i];
        } else {
            $curSum += $array[$i];
        }
        if ($curSum > $greateSum) {
            $greateSum = $curSum;
        }
    }
    return $greateSum;
}

$array = [6, -3, -2, 7, -15, 1, 2, 2];
$greateSum = FindGreatestSumOfSubArray($array);
echo $greateSum;