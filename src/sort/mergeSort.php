<?php

/*
マージソート
分割統治法で解く
配列の全要素をマージソートする関数を定義すると
全要素のソートは左半分のソートと右半分のソートをしてこの左と右の要素を比較して並び替えるとできる。
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

mergeSort($list,0, $listCount-1);

echo 'ソート完了';
echo '<pre>';
foreach ($list as $value) {
    echo $value;
    echo '<br>';
}
echo '</pre>';

function mergeSort(&$list, $first, $last) {

    if ($first < $last) { //実施条件(分割できる事。)これがないと再帰が終わらない。
        $center = intval(($first + $last) / 2);
        $p      = 0;
        $j      = 0;
        $k      = $first;
        $tmp    = null;   //待避配列

        //前半部分をソートする
        mergeSort($list, $first, $center);
        //後半部分をソートする
        mergeSort($list, $center + 1, $last);

        //ここから前半部分と後半部分を比較して一つにする

        //ソート済みの前半部分を待避配列に全て保存する
        for ($i = $first; $i <= $center; $i++) {
            $tmp[$p++] = $list[$i];
        }

        //$iが対象配列の最後まで行って、$tmp配列を全て調べ終わるまで行う
        //$iは$center + 1から。つまり右側と左側($tmp)の比較
        //$pも$center + 1。
        //$jは0から
        //$kも0から (再帰で使う時は$first)
        while ($i <= $last && $j < $p) {
            if ($tmp[$j] <= $list[$i]) {
                //前半部分の配列が後半部分よりも小さい時
                //そのまま対象配列に前半部分の値を保存
                $list[$k] =  $tmp[$j];
                //ポインタは各々増やす
                $k++;
                $j++;
            } else {
                //後半部分のほうが小さい時
                //対象配列に後半部分の値を入れる。
                //前半部分の配列は$tmp配列にコピーしているので上書きでOK
                $list[$k] = $list[$i];
                //ポインタを各々増やす
                $k++;
                $i++;
            }
        }

        //余っている待避配列があれば、全て並び替えの対象配列に追加する
        while ($j < $p) {
            $list[$k++] = $tmp[$j++];
        }
    }
}
