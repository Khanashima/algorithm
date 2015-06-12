<?php

/*
単純選択ソート
ソート済みでない物の中から最小値を探して、１個ずつ並べていく方法
*/

//0～200の配列を作成。stepは1
$list = range(0, 200 , 1);
//配列をシャッフルする
shuffle($list);

echo 'ソートする配列は';
echo '<pre>';
var_dump($list);
echo '</pre>';

$listCount = count($list);
$isChange  = false;

for($sortedCount = 0; $sortedCount < $listCount; $sortedCount++ ) {
    //最小値のキーの変数を定義。まずは基準位置をセットする
    $min = $sortedCount;
    //最小値を探す
    for ($index = $sortedCount +1; $index < $listCount; $index++) {
        if ($list[$index] < $list[$sortedCount]) {
            $min      = $index;
            $isChange = true;
        }
        if ($isChange) {
            //最小値が変わったら
            $tmp                = $list[$sortedCount];
            $list[$sortedCount] = $list[$min];
            $list[$index]       = $tmp;
            $isChange           = false;
        }
    }
}

echo 'ソート完了';
echo '<pre>';
foreach ($list as $value) {
    echo $value;
    echo '<br>';
}
echo '</pre>';