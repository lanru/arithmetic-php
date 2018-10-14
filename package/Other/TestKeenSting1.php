<?php
/**
 * Created by PhpStorm.
 * User: wlh
 * Date: 2018/10/14
 * Time: 10:02 AM
 */

/*
 1， 现在有一个字符串，你要对这个字符串进行 n 次操作，每次操作给出两个数字：(p, l) 表示当前字符串中从下标为 p 的字符开始的长度为 l 的一个子串。你要将这个子串左右翻转后插在这个子串原来位置的正后方，求最后得到的字符串是什么。字符串的下标是从 0 开始的，你可以从样例中得到更多信息。

    每组测试用例仅包含一组数据，每组数据第一行为原字符串，长度不超过 10 ，仅包含大小写字符与数字。接下来会有一个数字 n 表示有 n 个操作，再接下来有 n 行，每行两个整数，表示每次操作的(p , l)。

    保证输入的操作一定合法，最后得到的字符串长度不超过 1000。
 */

class TestKeenSting1
{
    private $str;

    public function __construct($str)
    {
        $this->str = $str;
    }

    public function run($orders)
    {
        foreach ($orders as $item) {
            $this->execute($item[0], $item[1]);
        }
        return $this->str;
    }

    private function execute($pos, $length)
    {
        $len = strlen($this->str);
        if (($length - $pos) > $len)
            exit(1);
        else
            $tmp_str = substr($this->str, $pos, $length);
        $s1 = substr($this->str, 0, $pos + $length);
        $s2 = substr($this->str, $pos + $length);
        $dest_str = $this->str_reverse($tmp_str);
        $this->str = $s1 . $dest_str . $s2;
    }

    private function str_reverse($str)
    {
        $len = strlen($str);
        if ($len % 2 == 0)
            $times = $len / 2;
        else
            $times = ($len - 1) / 2;

        for ($i = 0; $i < $times; $i++) {
            $t = $str[$len - 1 - $i];
            $str[$len - 1 - $i] = $str[$i];
            $str[$i] = $t;
        }

        return $str;
    }
}

$a = new TestKeenSting1('abcd');
$re = $a->run([[0, 2], [1, 3]]);
echo $re;