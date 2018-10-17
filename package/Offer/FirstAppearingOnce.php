<?php
/**
 * Created by PhpStorm.
 * User: wlh
 * Date: 2018/10/17
    题目
    请实现一个函数用来找出字符流中第一个只出现一次的字符。例如，当从字符流中只读出前两个字符”go”时，第一个只出现一次的字符是”g”。当从该字符流中读出前六个字符“google”时，第一个只出现一次的字符是”l”。
    输出描述:
    如果当前字符流没有存在出现一次的字符，返回#字符

  题解
  使用索引数组
 */

global $result;
//Init module if you need
function Init()
{
    global $result;
    $result = [];
}

//Insert one char from stringstream
function Insert($ch)
{
    global $result;
    // write code here
    if (isset($result[$ch])) {
        $result[$ch]++;
    } else {
        $result[$ch] = 1;
    }
}

//return the first appearence once char in current stringstream
function FirstAppearingOnce()
{
    global $result;
    foreach ($result as $k => $v) {
        if ($v == 1) {
            return $k;
        }
    }
    return "#";
}

$temp = "googsdfle";
for ($i = 0; $i < strlen($temp); $i++) {
    $ch = substr($temp, $i, 1);
    Insert($ch);
//    $re[] = substr($temp, $i, 1);
}
$first = FirstAppearingOnce();
echo $first;