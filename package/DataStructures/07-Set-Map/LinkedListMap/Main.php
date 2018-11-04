<?php
/**
 * Created by PhpStorm.
 * User: wlh
 * Date: 2018/11/4
 * Time: 11:10 AM
 */

require_once __DIR__ . "/LinkedListMap.php";
$listMap = new LinkedListMap();

$words = explode(" ", "The Trump administration moved Friday toward its goal of maximum economic pressure against Iran, while granting waivers allowing eight countries to temporarily import Iranian oil  eight without facing U.S. punishment.");
foreach ($words as $item) {
    if ($listMap->contains($item)) {
        $count = $listMap->get($item) + 1;
        $listMap->set($item, $count);
    } else {
        $listMap->add($item, 1);
    }
}
$size = $listMap->getSize();
echo $size . "\n";
$freq = $listMap->get("eight");
echo $freq;