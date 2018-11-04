<?php
/**
 * Created by PhpStorm.
 * User: wlh
 * Date: 2018/11/4
 * Time: 11:10 AM
 */

require_once __DIR__ . "/BSTMap.php";
$map = new BSTMap();

$words = explode(" ", "The Trump administration moved Friday toward its goal of maximum economic pressure against Iran, while granting waivers allowing eight countries to temporarily import Iranian oil  eight without facing U.S. punishment.");
foreach ($words as $item) {
    if ($map->contains($item)) {
        $count = $map->get($item) + 1;
        $map->set($item, $count);
    } else {
        $map->add($item, 1);
    }
}
$size = $map->getSize();
echo $size . "\n";
$freq = $map->get("eight");
echo $freq;