<?php
/**
 * Created by PhpStorm.
 * User: wlh
 * Date: 2018/11/14
 * Time: 11:11 PM
 */
// 毫秒级时间戳
function getMillisecond() {
    list($t1, $t2) = explode(' ', microtime());
    return (float)sprintf('%.0f',(floatval($t1)+floatval($t2))*1000);
}