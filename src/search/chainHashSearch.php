<?php

/* 
ハッシュサーチ
データを一定の規則にしたがってハッシュ値に変換し、ハッシュ値を比較して検索を行う方式。
キーをハッシュ値にし値を格納する。
ハッシュ値が同じ場合は線形リストで格納する。
線形リストの他にオープンハッシュ法がある。
 */

/*
問題
ハッシュ形式で値を格納し1,5,15,25,100があるか調べよ。
 */

require_once './part/Bucket.php';
require_once './part/ChainHashBox.php';

//ハッシュボックスを作成し、値を追加する
$chainHashBox = new chainHashBox(10);
$chainHashBox->add(1);
$chainHashBox->add(2);
$chainHashBox->add(3);
$chainHashBox->add(4);
$chainHashBox->add(5);
$chainHashBox->add(6);
$chainHashBox->add(7);
$chainHashBox->add(8);
$chainHashBox->add(9);
$chainHashBox->add(10);
$chainHashBox->add(15);
$chainHashBox->add(25);

echo '<pre>';
$list = $chainHashBox->getList();
var_dump($list);
echo '<br>';

echo '探索テスト<br>';
echo '1の探索テスト<br>';
$searchingValue = 1;
$key = $chainHashBox->search($searchingValue);
if ($key) {
    echo $searchingValue . 'はlist[' . $key . ']に格納されています。';
    var_dump($list[$key]);
}
echo '<br>';

echo '5の探索テスト<br>';
$searchingValue = 5;
$key = $chainHashBox->search($searchingValue);
if ($key) {
    echo $searchingValue . 'はlist[' . $key . ']に格納されています。';
    var_dump($list[$key]);
}
echo '<br>';

echo '15の探索テスト<br>';
$searchingValue = 15;
$key = $chainHashBox->search($searchingValue);
if ($key) {
    echo $searchingValue . 'はlist[' . $key . ']に格納されています。';
    var_dump($list[$key]);
}
echo '<br>';

echo '25の探索テスト<br>';
$searchingValue = 25;
$key = $chainHashBox->search($searchingValue);
if ($key) {
    echo $searchingValue . 'はlist[' . $key . ']に格納されています。';
    var_dump($list[$key]);
}
echo '<br>';

echo '100の探索テスト<br>';
$searchingValue = 100;
$key = $chainHashBox->search($searchingValue);
if ($key) {
    echo $searchingValue . 'はlist[' . $key . ']に格納されています。';
    var_dump($list[$key]);
} else {
    echo '値はありません。';
}
echo '<br>';

echo '</pre>';
