<?php

/* 
階乗の計算を再帰を使って求める
 */

var_dump(calculateFactorial(1));
echo '<br>';
var_dump(calculateFactorial(4));

function calculateFactorial($n) {
    if ($n == 1) {
        return 1;
    }
    return $n * calculateFactorial($n - 1);
}