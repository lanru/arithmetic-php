<?php
/**
 * Created by PhpStorm.
 * User: wlh
 * Date: 2018/11/5
 * Time: 2:30 PM
 */

$str = "{\"topics\":[{\"price\":5,\"_id\":{\"$oid\":\"5993fee96dcf9e0f13915f66\"},\"skills\":[{\"$oid\":\"56d82658c07b49cf3b6a8eea\"}]}],\"people\":null,\"updated_at\":{\"$date\":\"2017-08-16T08:14:33.835Z\"},\"created_at\":{\"$date\":\"2017-08-16T08:14:33.835Z\"},\"time\":[\"偶尔\"],\"city\":{\"$oid\":\"56c9ee713d2ab4b9000d870a\"},\"show\":true,\"status\":0}";
$json = json_decode($str, true);
$str1 = "[{\"$oid\":\"59ca2aa0c206d05f01665898\"},{\"$oid\":\"59ca1efdbfb8d5817e73c8ab\"},{\"$oid\":\"59ca22f8c206d05f0166587d\"},{\"$oid\":\"59c8e9e970b66f9a15c130b3\"}]";
$json2 = json_decode($str1, true);
echo $json2;
$str3 = "[118.168525,24.47863]";
$json3 = json_decode($str3, true);
echo $json3;