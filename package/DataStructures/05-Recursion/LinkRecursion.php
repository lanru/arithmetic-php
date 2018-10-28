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
 * PHP7新特性  类型
 * 可空返回类型
 */
function removeEleByRecursion(?ListNode $head, $val): ?ListNode
{
    if ($head == null) {
        return null;
    }
    $res = removeEleByRecursion($head->next, $val);
    if ($head->val == $val) {
        return $res;
    } else {
        $head->next = $res;
        return $head;
    }
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

$nums = [1, 2, 6, 3, 4, 5, 6];
$head = new ListNode(1);
$head->init($nums);
echo $head;

$res = removeEleByRecursion($head, 6);
echo $res;