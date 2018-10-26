<?php
/**
 * Created by PhpStorm.
 * User: wlh
 * Date: 2018/10/26
 * Time: 12:10 AM
 */

require_once "ArrayStack.php";
require_once "LinkedListStack.php";
$stack = new LinkedListStack();
for ($i = 0; $i < 5; $i++) {
    $stack->push($i);
    echo $stack;
}

$stack->pop();
echo $stack;