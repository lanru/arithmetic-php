<?php

/**
 * Created by PhpStorm.
 * User: wlh
 * Date: 2018/10/14
 * Time: 8:55 PM
 * 题目
 * 汇编语言中有一种移位指令叫做循环左移（ROL），现在有个简单的任务，就是用字符串模拟这个指令的运算结果。对于一个给定的字符序列S，请你把其循环左移K位后的序列输出。例如，字符序列S=”abcXYZdef”,要求输出循环左移3位后的结果，即“XYZdefabc”。是不是很简单？OK，搞定它！
 *
 * 题解
 * 有几种解法。主要是使用substr函数。可以看出最终字符串分为两个部分，把这两部分拼接起来就可以。
 */
class LeftRotateString
{
    static function cal($str, $n)
    {
        $len = strlen($str);
        $str .= $str;
        $re = substr($str, $n, $len);
        echo $re;
    }
}

$str = "abcXYZdef";
LeftRotateString::cal($str,3);