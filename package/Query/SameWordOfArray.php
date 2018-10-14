<?php
/**
 * Created by PhpStorm.
 * User: wlh
 * Date: 2018/10/14
 * Time: 11:23 AM
 */

class SameWordOfArray
{
    /*
     两次循环，对数组A的每个值，到数组B中遍历，如果能找到，则添加到结果数组
     */
    public function findTheSameItems($arr1, $arr2)
    {

        $result = [];
        for ($i = 0; $i < count($arr1); $i++) {
            $value = $arr1[$i];
            for ($j = 0; $j < count($arr2); $j++) {
                if ($value == $arr2[$j]) {
                    array_push($result, $value);
                }
            }
        }
        var_dump($result);
    }
}

(new SameWordOfArray())->findTheSameItems([6, 2, 1, 5], [3, 4, 0, 5]);