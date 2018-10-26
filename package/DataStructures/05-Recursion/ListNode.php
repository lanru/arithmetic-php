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
