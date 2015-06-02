<?php

/* 
リニアサーチ
対象のデータを先頭から順番に調べていく手法
 */

/*
問題
95400の値が配列にあるか調べよ。
 */
//0から100000の配列を生成。stepは1
$list = range(0, 100000 , 1);

$startTime = microtime(true);

define ('SEARCHINGVALUE', 95400);
$length = count($list);
$isFind = false;
for ($i=0; $i < $length; $i++) {
    if ($list[$i] === SEARCHINGVALUE) {
        $isFind = true;
        echo '見つかりました。キーは' . $i . 'です';
        break;
    }
}
if (!$isFind) {
	echo '見つかりませんでした。';
}

$endTime = microtime(true);
$deltaTime = $endTime - $startTime;
echo('<br>処理にかかった時間は' . $deltaTime . 'ミリ秒です');