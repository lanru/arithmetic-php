<?php
/**
 * Created by PhpStorm.
 * User: wlh
 * Date: 2018/10/25
 * Time: 11:02 PM
 */
require_once "LinkedList.php";
$link = new LinkedList();
for ($i = 0; $i < 5; $i++) {
    $link->addFirst($i);
    echo $link;
}

$link->add(2, 666);
echo $link;