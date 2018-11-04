<?php
/**
 * Created by PhpStorm.
 * User: wlh
 * Date: 2018/11/3
 * Time: 10:21 PM
 */
require_once "./BSTSet.php";
function getMillisecond()
{
    list($t1, $t2) = explode(' ', microtime());
    return (float)sprintf('%.0f', (floatval($t1) + floatval($t2)) * 1000);
}

function testSet($set)
{
    $startTime = getMillisecond();


    $endTime = getMillisecond();

    return $endTime - $startTime;
}

function uniqueMorseRepresentations(array $words)
{
    $codes = [".-", "-...", "-.-.", "-..", ".", "..-.", "--.", "....", "..", ".---", "-.-", ".-..", "--", "-.", "---", ".--.", "--.-", ".-.", "...", "-", "..-", "...-", ".--", "-..-", "-.--", "--.."];

    $set = new BSTSet();
    foreach ($words as $word) {
        $res = "";
        for ($i = 0; $i < strlen($word); $i++) {
            $idx = ord(substr($word, $i, 1)) - ord('a');
            $res .= $codes[$idx];
        }
        $set->add($res);
    }
    return $set->getSize();
}

$size = uniqueMorseRepresentations(["sbc", "abc", "def"]);
echo $size;