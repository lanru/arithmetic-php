<?php
/**
 * Created by PhpStorm.
 * User: wlh
 * Date: 2018/11/4
 * Time: 10:11 AM
 */

interface Map
{
    function add($k, $v);

    function remove($k);

    function contains($K): bool;

    function get($k);

    function set($k, $v);

    function getSize(): int;

    function isEmpty(): bool;
}