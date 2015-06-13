<?php

/*
適当な間隔をあけた飛び飛びのデータ列に対してあらかじめソートしておき、挿入ソートを適用する
今回の間隔は
h(n+1) = 3h(n) + 1 という条件で選び出した数列 1, 4, 13, 40, 121, ...
h(1) = 1
このhの中から配列のサイズ / 9の値以下にすると効率が良い。
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
//まず最初にとびとびの間隔を決める
$step = 1;
for($step_tmp = 1; $step_tmp < $listCount / 9; $step_tmp = $step_tmp * 3 + 1 ){
    $step = $step_tmp;
}

while($step > 0 ){
    //最初は離れたところで交換。次第に細かく。
    for($index = $step; $index < $listCount; $index++ ){
        $tmp = $list[$index];
        //考え方は挿入ソートとほぼ同じ。離れた相手と比較するだけ
        for($j = $index - $step; $j >= 0 && $list[$j] > $tmp; $j = $j - $step ){
            $list[$j + $step ] = $list[$j];
        }
        $list[$j + $step] = $tmp;
    }
    $step = (int) ($step / 3);
}

echo 'ソート完了';
echo '<pre>';
foreach ($list as $value) {
    echo $value;
    echo '<br>';
}
echo '</pre>';