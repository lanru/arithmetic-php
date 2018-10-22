<?php
/**
 * Created by PhpStorm.
 * User: wlh
 * Date: 2018/10/17
    题目
    定义栈的数据结构，请在该类型中实现一个能够得到栈最小元素的min函数。

    题解
    四个功能：
    push
    pop
    top：栈顶元素
    min：找出最小的元素
 */
$arr = array();

function mypush($node)
{
    // write code here
    global $arr;
    array_push($arr, $node);
}

function mypop()
{
    global $arr;
    return array_pop($arr);

}

function mytop()
{
    global $arr;
    $top = count($arr);
    return $arr[$top - 1];
}

function mymin()
{
    global $arr;
    $min = $arr[0];
    for ($i = 1; $i < count($arr); $i++) {
        if ($arr[$i] < $min)
            $min = $arr[$i];
    }
    return $min;
}