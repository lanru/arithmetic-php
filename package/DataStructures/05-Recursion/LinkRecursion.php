<?php
/**
 * Created by PhpStorm.
 * User: wlh
 * Date: 2018/10/26
 * Time: 11:02 PM
 */

class ListNode
{
    public $val;
    public $next;

    public function __construct($x)
    {
        $this->val = $x;
    }

    public function init(array $arr)
    {
        if ($arr == null || count($arr) == 0) {
            throw  new Exception("");
        }
        $this->val = $arr[0];
        $cur = $this;
        for ($i = 1; $i < count($arr); $i++) {
            $cur->next = new ListNode($arr[$i]);
            $cur = $cur->next;
        }
    }

    public function __toString()
    {
        $res = "";
        $cur = $this;
        while ($cur != null) {
            $res .= $cur->val . "->";
            $cur = $cur->next;
        }
        $res .= "NULL\n";
        return $res;
    }
}


/*
 * PHP7新特性  标量类型声明
 * 可空返回类型
 */
function removeElements(?ListNode $head, $val, $depth): ?ListNode
{

    $depthString = generateDepthString($depth);
    echo $depthString;
    $str = "Call:remove " . $val . " in " . ($head ?? "null");
    echo $str;
    if ($head == null) {
        echo "\n";
        echo $depthString;
        echo "Return: " . ($head ?? "null") . "\n";
        return $head;
    }
//    $res = removeEleByRecursion($head->next, $val);
//    if ($head->val == $val) {
//        return $res;
//    } else {
//        $head->next = $res;
//        return $head;
//    }
    $res = $head->next = removeElements($head->next, $val, $depth + 1);
    echo $depthString;
    echo "After remove " . $val . ":" . ($res ?? "null");
    $ret = null;
    if ($head->val == $val) {
        $ret = $res;
    } else {
        $head->next = $res;
        $ret = $head;
    }
    echo $depthString;
    echo "\nReturn: " . $ret;
    return $ret;
}

function generateDepthString(?int $depth)
{
    $res = "";
    for ($i = 0; $i < $depth; $i++) {
        $res .= "--";
    }
    return $res;
}

function removeEle(ListNode $head, $val)
{
    while ($head != null && $head->val == $val) {
        $head = $head->next;
    }
    if ($head == null) {
        return null;
    }
    $prev = $head;
    while ($prev->next != null) {
        if ($prev->next->val == $val) {
            $prev->next = $prev->next->next;
        } else {
            $prev = $prev->next;
        }
    }
    return $head;
}

$nums = [6, 7, 8];
$head = new ListNode(1);
$head->init($nums);
echo $head;

$res = removeElements($head, 7, 0);
echo $res;