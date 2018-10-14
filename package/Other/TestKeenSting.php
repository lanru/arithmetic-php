<?php
/**
 * Created by PhpStorm.
 * User: wlh
 * Date: 2018/10/14
 * Time: 10:02 AM
 */

/*
 * 2,你作为一名出道的歌手终于要出自己的第一份专辑了，你计划收录 n 首歌而且每首歌的长度都是 s 秒，每首歌必须完整地收录于一张 CD 当中。每张 CD 的容量长度都是 L 秒，而且你至少得保证同一张 CD 内相邻两首歌中间至少要隔 1 秒。为了辟邪，你决定任意一张 CD 内的歌数不能被 13 这个数字整除，那么请问你出这张专辑至少需要多少张 CD ？
 */
class TestKeenSting
{


    private $song_num;
    private $song_size;
    private $cd_size;

    public function __construct($n, $s, $l)
    {
        if ($n > 100 || $s > $l)
            exit('input error!');
        $this->song_num = $n;
        $this->song_size = $s;
        $this->cd_size = $l;
    }
    public function run()
    {
        $cd_container = $this->calculate_single_cd();
        return ceil($this->song_num / $cd_container);
    }
    private function calculate_single_cd()
    {
        //假设一张cd可以放n个 song_length+1
        $n = floor($this->cd_size / ($this->song_size + 1));
        //对剩余空间做判断
        $gap = $this->cd_size - $n * ($this->song_size + 1);
        if ($gap == $this->song_size)//剩余空间是否刚好可以放一首歌
            if ($n != 12)//已经放了12首歌,不要这最后的一首
                $n += 1;
            else
                if ($n == 13) //如果之前就已经可以放13首,放弃一首
                    $n = 12;
        return $n;
    }
}

$a = new TestKeenSting(7, 2, 6);
$re = $a->run();
echo $re;