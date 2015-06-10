<?php

/* 
バイナリーサーチ
ソート済みのリストや配列に入ったデータに対する検索を行うにあたって、 
中央の値を見て、検索したい値との大小関係を用いて、
検索したい値が中央の値の右にあるか、左にあるかを判断して、片側には存在しないことを確かめながら検索していく手法
 */

/*
問題
95400の値が配列にあるか調べよ。
 */
//0から100000の配列を生成。stepは1
$list = range(0, 100000 , 1);

$startTime = microtime(true);
$listConut = count($list);

define ('SEARCHINGVALUE', 95400);

$startTime = microtime(true);
$firstIndex  = 0;
$lastIndex   = $listConut - 1;

$isFind = false;

do {
    $centerIndex = (Int) (($firstIndex + $lastIndex) / 2);
    if ($list[$centerIndex] == SEARCHINGVALUE) {
        $isFind = true;
        echo '見つかりました。キーは' . $centerIndex . 'です';
        break;
    } else if ($list[$centerIndex] < SEARCHINGVALUE) {
        $firstIndex = $centerIndex + 1;
    } else if ($list[$centerIndex] > SEARCHINGVALUE) {
        $lastIndex = $centerIndex - 1;
    }
} while($firstIndex <= $lastIndex);

if (!$isFind) {
	echo '見つかりませんでした。';
}

$endTime = microtime(true);
$deltaTime = $endTime - $startTime;
echo('<br>処理にかかった時間は' . $deltaTime . 'ミリ秒です');