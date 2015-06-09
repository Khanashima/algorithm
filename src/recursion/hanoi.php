<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

hanoi(2,"A", "B", "C");
echo '<br>';
hanoi(3,"A", "B", "C");

function hanoi($n, $a, $b, $c) {
    if ($n > 0) {
        hanoi($n-1, $a, $c, $b);
        echo $n .'番目の円盤を' . $a . 'から' .$b. 'に移動する';
        echo '<br>';
        hanoi($n-1, $c, $b, $a);
    }
}