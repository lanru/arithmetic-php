<?php
/**
 * Created by PhpStorm.
 * User: wlh
 * Date: 2018/10/26
 * Time: 12:10 AM
 */

require_once "ArrayStack.php";
$stack = new ArrayStack();
for ($i = 0; $i < 5; $i++) {
    $stack->push($i);
    echo $stack->toString();
}

$stack->pop();
echo $stack->toString();