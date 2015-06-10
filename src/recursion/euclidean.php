<?php

/* 
ユークリッドの互除法（ユークリッドのごじょほう、英: Euclidean Algorithm）は、
2 つの自然数または整式の最大公約数を求める手法の一つである。
2 つの自然数（または整式） a, b (a ≧ b) について、a の b による剰余を r とすると、
a と b との最大公約数は b と r との最大公約数に等しいという性質が成り立つ。
この性質を利用して、 b を r で割った剰余、 除数 r をその剰余で割った剰余、と剰余を求める計算を逐次繰り返すと、
剰余が 0 になった時の除数が a と b との最大公約数となる。
 */

echo '44と11の最大公約数は？';
var_dump(euclidean(44,11));
echo '<br>';
echo '44と13の最大公約数は？';
var_dump(euclidean(44,13));
echo '<br>';
echo '44と28の最大公約数は？';
var_dump(euclidean(44,28));
echo '<br>';
echo '44と44の最大公約数は？';
var_dump(euclidean(44,44));
echo '<br>';

function euclidean($x, $y) {
    if ($y == 0) {
        return $x;
    }
    return euclidean($y, (int)$x % $y);
}