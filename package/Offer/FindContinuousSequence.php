<?php
/**
 * Created by PhpStorm.
 * User: wlh
 * Date: 2018/10/14
 * Time: 8:40 PM
 */
//剑指offer-和为s的数列 暂时还不理解

class FindContinuousSequence
{
    public static function cal($sum)
    {
        $result = [];
        for ($n = (int)(sqrt(2 * $sum)); $n >= 2; $n --) {
            if ((($n & 1) == 1) && ($sum % $n == 0) || (($sum % $n) * 2 == $n)) {
                $list = [];
                for ($j = 0, $k = ($sum / $n) - ($n - 1) / 2; $j < $n; $j ++, $k ++) {
                    $list[] = $k;
                }
                $result[] = $list;
            }
        }
        return $result;
    }
}

var_dump(FindContinuousSequence::cal(100));