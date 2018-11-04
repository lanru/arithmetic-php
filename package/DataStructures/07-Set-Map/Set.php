<?php
/**
 * Created by PhpStorm.
 * User: wlh
 * Date: 2018/11/3
 * Time: 8:41 PM
 */

interface Set
{
    function add($e);

    function remove($e);

    function contains($e):?bool;

    function getSize():?int;

    function isEmpty():?bool;
}