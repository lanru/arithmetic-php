<?php

/**
 * Created by PhpStorm.
 * User: wlh
 * Date: 2018/10/22
 * Time: 11:00 PM
 */


interface  stack
{
    function getSize();

    function isEmpty();

    function push($e);

    function pop();

    function peek();
}

