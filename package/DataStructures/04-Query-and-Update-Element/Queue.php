<?php
/**
 * Created by PhpStorm.
 * User: wlh
 * Date: 2018/10/25
 * Time: 8:03 AM
 */

interface Queue
{
    function getSize();

    function isEmpty();

    function enqueue($e);

    function dequeue();

    function getFront();
}