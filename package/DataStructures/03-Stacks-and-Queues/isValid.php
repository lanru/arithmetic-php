<?php
/**
 * Created by PhpStorm.
 * User: wlh
 * Date: 2018/10/24
 * Time: 9:42 AM
 */
require_once "./Stack.php";

class Solution
{
    public static function isValid($s)
    {
        $stack = new ArrayStack();
        for ($i = 0; $i < strlen($s); $i++) {
            $c = substr($s, $i, 1);
            if (in_array($c, ['(', '[', '{'])) {
                $stack->push($c);
            } else {
                if ($stack->isEmpty()) {
                    return false;
                }
                $topChar = $stack->pop();
                if ($c == ")" && $topChar !== "(") {
                    return false;
                }
                if ($c == "]" && $topChar != "[") {
                    return false;
                }
                if ($c == "}" && $topChar != "{") {
                    return false;
                }

            }
        }
        return $stack->isEmpty();
    }
}

$str = "{[()]}";
$res = Solution::isValid($str);
echo "result:" . $res;
