<?php

/*
Boyer Moore法
見つけたい文字(パターン)の末尾から探していく
テキストの頭から進める。
パターンに含まれて居ない文字の場合はパターンの数分ずらす
パターンに含まれている場合は、最小限の移動
 */
mb_internal_encoding("UTF-8");
//日本語
//①全部同じ
var_dump(bMSearch('テストトテスト', 'テストトテスト'));                            //true
echo '<br>';
//②最初でマッチ
var_dump(bMSearch('テストトテストトトト', 'テストトテスト'));                      //true
echo '<br>';
//③途中でマッチ
var_dump(bMSearch('テストトテストストトテストテテテテテ', 'テストトテスト'));       //true
echo '<br>';
//④途中でマッチ
var_dump(bMSearch('aaaabdfdsrtatテストトテストストトテストテ', 'テストトテスト')); //true
echo '<br>';
//⑤最後でマッチ
var_dump(bMSearch('テストトテテストトテスト', 'テストトテスト'));                  //true
echo '<br>';
//⑥最後でマッチ2
var_dump(bMSearch('テストトテnトテストトテスト', 'テストトテスト'));               //true
echo '<br>';
//⑦最後でマッチ3
var_dump(bMSearch('テストトテスnテストトテスト', 'テストトテスト'));               //true
echo '<br>';
//⑧見つけたい文字よりも短い
var_dump(bMSearch('テスト', 'テストトテスト'));                                   //false
echo '<br>';
//⑨一致しない
var_dump(bMSearch('テストトテス', 'テストトテスト'));                             //false
echo '<br>';
//⑩一致しない
var_dump(bMSearch('後戻りを考慮せず無限ループではまる', 'テストトテスト'));                             //false

function bMSearch($text, $pattern) {
    $tLength   = mb_strlen($text);    //テキストの長さ
    $pLength   = mb_strlen($pattern); //パターンの長さ
    $shifTable = array();             //シフトする量のマスタテーブル

    //シフトテーブルの作成。末尾の１個前まで実施
    for ($i = 0; $i < $pLength - 1; $i++) {
        //キーはパターンの文字。値はシフト量
        $shifTable[mb_substr($pattern, $i, 1, 'UTF-8')] = $pLength - $i -1;
    }
    //パターンの末尾のみの計算。もし、既に文字がある場合は何もしない。最初のfor分でやるとシフト量が0になるため
    if (!array_key_exists(mb_substr($pattern, $pLength-1, 1, 'UTF-8'), $shifTable)) {
        $shifTable[mb_substr($pattern, $pLength-1, 1, 'UTF-8')] = $pLength;
    }

    //var_dump($shifTable);
    //exit('');
    //探索する
    //テキストのindexをパターンの末尾とあわせる。末尾から探索していく
    $tIndex = $pLength -1;
    while ($tIndex < $tLength) {
        //パターンの末尾位置
        $pp = $pLength - 1;
        //文字が一致している間実施
        while (mb_substr($text, $tIndex, 1, 'UTF-8') == mb_substr($pattern, $pp, 1, 'UTF-8')) {
            if ($pp == 0) {
                //探索成功
                return true;
            }
            $tIndex--;
            $pp--;
        }
        //移動する
        if (isset($shifTable[mb_substr($text, $tIndex, 1, 'UTF-8')])) {
            //後戻り対策。大きい方を取る
            $tIndex = $tIndex + MAX($shifTable[mb_substr($text, $tIndex, 1, 'UTF-8')], $pLength - $pp);
        } else {
            //パターン以外の文字の時
            $tIndex = $tIndex + $pLength;
        }
    }
    //探索失敗
    return false;
}
