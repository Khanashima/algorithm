<?php

/*
バブルソート
隣り合う要素の大小を比較しながら整列させること。
最後の要素から1個ずつ順々に見ていき、1個ずつ最小値を出していく.
これをソートしたい数-1回分行う。
 */


//$list = array(1,2,3,4,5,7,9,6,0,8);
//$list = array(1,2,3,4,5,6,7,8,9,0);
//$list = array(9,0,1,2,3,4,5,6,7,8);
$list = array(9,8,7,6,5,4,3,2,1,0);
//$list = array(0,1,2,3,4,5,6,7,8,9);
$listCount = count($list);

$sortedCount = 0;

while ($sortedCount < $listCount - 1) {
    $last = $listCount - 1;
    //要素の後ろから見ていく
    for ($index = $listCount - 1; $index > $sortedCount; $index--) {
        if($list[$index - 1] > $list[$index]) {
            //１個前の要素の方が大きい時、自分のと1個前の値を交換する
            $tmp              = $list[$index-1];
            $list[$index - 1] = $list[$index];
            $list[$index]     = $tmp;

            $last = $index;
        }
    }
    //ソート済の個数を記憶
    $sortedCount = $last;
    echo $sortedCount . '個昇順にソート済'; //既にソートされている場合は表示されない
    echo '<br>';
}

echo '<p>ソート完了</p>';
echo '<pre>';
var_dump($list);
echo '</pre>';
