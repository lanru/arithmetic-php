<?php
/**
 * Created by PhpStorm.
 * User: wlh
 * Date: 2018/10/16
 * 适配器模式
 * 将各种截然不同的函数接口封装成统一的API。
 * PHP中的数据库操作有MySQL,MySQLi,PDO三种，可以用适配器模式统一成一致，使不同的数据库操作，统一成一样的API。类似的场景还有cache适配器，可以将memcache,redis,file,apc等不同的缓存函数，统一成一致。
 * 首先定义一个接口(有几个方法，以及相应的参数)。然后，有几种不同的情况，就写几个类实现该接口。将完成相似功能的函数，统一成一致的方法。
 */

namespace IMooc;
interface IDatabase
{
    function connect($host, $user, $passwd, $dbname);

    function query($sql);

    function close();
}

class MySQL implements IDatabase
{
    protected $conn;

    function connect($host, $user, $passwd, $dbname)
    {
        $conn = mysql_connect($host, $user, $passwd);
        mysql_select_db($dbname, $conn);
        $this->conn = $conn;
    }

    function query($sql)
    {

        $res = mysql_query($sql, $this->conn);
        return $res;
    }

    function close()
    {
        mysql_close($this->conn);
    }
}

class MySQLi implements IDatabase
{
    protected $conn;

    function connect($host, $user, $passwd, $dbname)
    {
        $conn = mysqli_connect($host, $user, $passwd, $dbname);
        $this->conn = $conn;
    }

    function query($sql)
    {
        return mysqli_query($this->conn, $sql);
    }

    function close()
    {
        mysqli_close($this->conn);
    }
}

$host = "host";
$user = "user";
$passwd = "passwd";
$dbname = "dbname";
$sql="sql";
$mysql = new MySQL();
$mysql->connect($host,$user,$passwd,$dbname);
$mysql->query($sql);