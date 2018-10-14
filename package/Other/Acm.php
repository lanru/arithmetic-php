<?php

class Acm
{
    /**
     * Created by PhpStorm.
     * User: wlh
     * Date: 2018/10/13
     * Time: 12:29 PM
     */
//    public function testPackage()
//    {
//        //背包承重上限
//        $limit = 8;
//        //物品种类
//        $total = 5;
//        //物品
//        $array = array(
//            array("栗子", 4, 4500),
//            array("苹果", 5, 5700),
//            array("橘子", 2, 2250),
//            array("草莓", 1, 1100),
//            array("甜瓜", 6, 6700)
//        );
//        //存放物品的数组
//        $item = array_fill(0, $limit + 1, 0);
//        //存放价值的数组
//        $value = array_fill(0, $limit + 1, 0);
//        $p = $newvalue = 0;
//        for ($i = 0; $i < $total; $i++) {
//            for ($j = $array[$i][1]; $j <= $limit; $j++) {
//                $p = $j - $array[$i][1];
//                $newvalue = $value[$p] + $array[$i][2];
//                //找到最优解的阶段
//                if ($newvalue > $value[$j]) {
//                    $value[$j] = $newvalue;
//                    $item[$j] = $i;
//                }
//            }
//        }
//        echo "物品  价格<br />";
//        for ($i = $limit; 1 <= $i; $i = $i - $array[$item[$i]][1]) {
//            echo $array[$item[$i]][0] . "  " . $array[$item[$i]][2] . "<br />";
//        }
//        echo "合计  " . $value[$limit];
//    }

//    public function testMax()
//    {
//        $str = "pwwkew";
//        $temp = array();
//        $length = 0;
//        for ($i = 0; $i < strlen($str); $i++) {
//            $char = $str[$i];
//            if (in_array($char, $temp)) {
//                if (count($temp) >= $length) {
//                    $length = count($temp);
//                    $result = substr($str, $i - $length, $length);
//                }
//                $temp = [];
//            }
//            array_push($temp, $str[$i]);
//        }
//        if (count($temp) > $length) {
//            $result = substr($str, '-' . count($temp));
//        }
//        print_r("最大长度为:" . strlen($result));
//        print_r("\n最大长度对应的字符串为:" . $result);
//    }


//    public function testDept()
//    {
//        print_r('请输入数组长度:');
//        print_r("\n");
////        fscanf(STDIN, "%d", $M);
//         $M = 5;
//        //构造随机数组
////        $info = [[1,0,0,1,1],[1,0,0,1,1],[0,0,1,0,0],[0,0,1,0,0],[0,0,1,0,0]];
//        $info=[];
//        for ($i = 0; $i < $M; $i++) {
//            for ($j = 0; $j < $M; $j++) {
//                $info[$i][$j] = rand(0, 1);
//                print_r($info[$i][$j] . " ");
//            }
//            print_r("\n");
//        }
//        $num = 0;
//        for ($i = 0; $i < $M; $i++) {
//            for ($j = 0; $j < $M; $j++) {
//                if ($info[$i][$j] == 1) {
//                    if ($j > 0) {
//                        if ($i > 0) {
//                            if ($info[$i][$j - 1] == 0 && $info[$i - 1][$j] == 0) {
//                                $num++;
//                            } elseif ($info[$i][$j - 1] == 1 && $info[$i - 1][$j] == 1 && $info[$i - 1][$j - 1] == 0) {
////                                Log::info("i:$i,j:$j");
//                                print_r("\n i:$i");
//                                print_r("\n j:$j");
//
//                                $num--;
//                                print_r("\n num:$num");
//                            }
//                        } else { // 第一行
//                            if ($info[$i][$j - 1] == 0) {
//                                $num++;
//                            }
//                        }
//                    } else { // $j=0 第一列
//                        if ($i > 0) {
//                            if ($info[$i - 1][$j] == 0) {
//                                $num++;
//                            }
//                        } else {//$i = 0 第一行
//                            $num++;
//                        }
//                    }
//                }
//            }
//        }
//        print_r("\n部门数为:$num");
//    }

// 测试ip地址是否正确
    public
    function testIp()
    {
        print_r("请输入错误ip:");
        fscanf(STDIN, '%s', $ip);
//        $ip = "19216801";
        $ip_len = strlen($ip);
        if ($ip_len > 12 || $ip_len < 4) {
            print_r('输入ip有误');
            exit(0);
        }
        $pos_ip = [];
        $p = 0;

        print_r('可能的结果有:');
        for ($i = 1; $i < 4; $i++) {
            $first = substr($ip, 0, $i);
            if ($first >= 255) {
                continue;
            }
            for ($j = 1; $j < 4; $j++) {
                $second = substr($ip, $i, $j);
                if ($second >= 255) {
                    continue;
                }
                for ($k = 1; $k < 4; $k++) {
                    $four_len = $ip_len - $i - $j - $k;
                    if ($four_len <= 0) {
                        continue;
                    }
                    $third = substr($ip, ($i + $j), $k);
                    $four = substr($ip, ($i + $j + $k), $four_len);
                    if ($third >= 255 || $four >= 255) {
                        continue;
                    }
                    $pos_ip[$p++] = $first . '.' . $second . '.' . $third . '.' . $four;
                    print_r("\n" . $pos_ip[$p - 1]);
                }
            }
        }
        print_r("\n有" . $p . '种可能');
    }

    public
    function testIsUnicode()
    {
//        print_r('请输入数组长度:');
//        fscanf(STDIN, '%d', $n);
//        print_r("请输入 $n 个整数,以空格分隔:");
//        $data = fgets(STDIN);
        $n = 4;
        $data = "0001 0000 0010 FFFF";
        $temp_arr = explode(' ', $data);
        if (count($temp_arr) > $n) {
            print_r('输入数组长度与实际长度不符，已自动提取前' . $n . '个组成对应数组');
        } elseif (count($temp_arr) < $n) {
            print_r('数组长度不够,请重新输入！');
        }

        $arr = array_slice($temp_arr, 0, $n);
        $result = array();

        print_r("结果表示:");
        foreach ($arr as $item => $itemVal) {
            if ($itemVal[0] == 0) {
                if (strlen($itemVal) > 2 && strlen($itemVal) < 6) {
                    $result[$item] = 1;
                } else {
                    $result[$item] = 0;
                }
            } else {
                $num = ceil(strlen($itemVal) / 8);
                if ($num < 2) {
                    $result[$item] = 0;
                } else {
                    if (substr($itemVal, 0, $num) == str_repeat('1', $num) && substr($itemVal, $num, (8 - $num)) == str_repeat('0', 8 - $num)) {
                        for ($i = 1; $i < $num; $i++) {
                            if (substr($itemVal, 8 * $i, 2) == '10') {
                                $i == ($num - 1) && $result[$item] = 1;
                            } else {
                                $result[$item] = 0;
                                break;
                            }
                        }
                    } else {
                        $result[$item] = 0;
                    }
                }
            }
            print_r($result[$item] . " ");
        }
    }

    public
    function testHongRen()
    {
//        print_r('请输入用户数:');
//        fscanf(STDIN, '%d', $N);
//
//        print_r('请输入关系对数:');
//        fscanf(STDIN, '%d', $M);
//
//        print_r('请输入' . $M . '对关系,以,分离,每两个一对:');
//        $D = fgets(STDIN, 4 * $M);
//        $data = explode(' ', $D);
        $N = 3;
        $M = 3;
        $D = "1 2 2 1 2 3";
        $data = explode(' ', $D);

        while (count($data) < 2 * $M) {
            print_r('关系对不够，请重新输入:');
            $D = fgets(STDIN, 4 * $M);
            $data = explode(' ', $D);
        }

        if (count($data) > 2 * $M) {
            array_filter($data);
            $data = array_slice($data, 0, 2 * $M);
            print_r('数据多比预期关系对数多,已提取前' . $M . '对！');
        }

        $temp = array();
        for ($i = 0; $i < 2 * $M; $i = $i + 2) {
            if (!array_key_exists($data[$i], $temp)) {
                $temp[$data[$i]] = array();
            }
            if (!in_array($data[$i + 1], $temp[$data[$i]])) {
                str_replace("\n", '', $data[$i + 1]);
                array_push($temp[$data[$i]], $data[$i + 1]);
            }
        }

        $result = [];
        foreach ($temp as $item => $itemVal) {
            foreach ($itemVal as $ltVal) {
                if (!array_key_exists($ltVal, $result)) {
                    $result[$ltVal] = array();
                }
                if (!in_array($item, $result[$ltVal])) {
                    array_push($result[$ltVal], $item);
                }
                if (!array_key_exists($ltVal, $temp)) {
                    continue;
                }
                foreach ($temp[$ltVal] as $ptVal) {
                    if (!array_key_exists($ptVal, $result)) {
                        $result[$ptVal] = [];
                    }
                    if (!in_array($item, $result[$ptVal]) && $item != $ptVal) {
                        array_push($result[$ptVal], $item);
                    }
                    if (!in_array($ltVal, $result[$ptVal])) {
                        array_push($result[$ptVal], $ltVal);
                    }
                }
            }
        }

        print_r('抖音红人有:');
        $count = 0;
        foreach ($result as $item => $value) {
            if (count($value) >= $N - 1) {
                print_r($item . ' ');
                $count++;
            }
        }
        print_r("\n总人数为:$count");
    }
}