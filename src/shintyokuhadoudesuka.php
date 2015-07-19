<?php

/* 
「進捗・どう・です・か」をランダムに表示し
「進捗どうですか」が完成したら煽ってくるプログラム
 */

$source = array('進捗', 'どう', 'です', 'か');

$words = array();
$n     = 0;

while (true) {
    $randomWord = $source[mt_rand(0, 3)];
    $words[]    = $randomWord;
    echo $randomWord;
    if ($n > 2 &&
        $words[$n]   == 'か' &&
        $words[$n-1] == 'です' &&
        $words[$n-2] == 'どう' &&
        $words[$n-3] == '進捗'
    ) {
        break;
    }
    $n++;
}

echo '???';
echo '<br>';
echo (mb_strlen(implode('', $words))) . ' 文字で煽られた';

