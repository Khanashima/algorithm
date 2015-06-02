<?php

/* 
問題
FizzBuzz問題
1から順番に数を表示する
3で割り切れる場合Fizzと表示
5で割り切れる場合Buzzと表示
3と5で割り切れる場合FizzBuzzと表示
それ以外は数値をそのまま表示
*/

$endValue = 30;

for ($i = 1; $i < $endValue + 1; $i++) {
    if ($i % 15 == 0) {
        echo 'FizzBuzz';
    } else if ($i % 5 == 0) {
        echo 'Buzz';
    } else if ($i % 3 == 0) {
        echo 'Fiz';
    } else {
        echo $i;
    }
	echo '<br>';
}