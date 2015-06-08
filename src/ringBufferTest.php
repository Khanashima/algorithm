<?php

/* 
リングバッファ
バッファ領域のうち、終端と先端が連結され、循環的に利用できるもの
 */

require_once './part/RingBuffer.php';

//リングバッファを10とする
$que = New RingBuffer(10);

$que->enque(1);
$que->enque(2);
$que->enque(3);
$que->enque(4);
$que->enque(5);
$que->enque(6);
$que->enque(7);
$que->enque(8);
$que->enque(9);
$que->enque(10);
$que->enque(11);

echo '<pre>';
var_dump($que->getQue());
echo '<br>';
echo $que->deque();
echo '<br>';
echo $que->deque();
echo '<br>';
echo $que->deque();
echo '<br>';
echo $que->deque();
echo '<br>';
echo $que->deque();
echo '<br>';
echo $que->deque();
echo '<br>';
echo $que->deque();
$que->enque(12);
echo '<br>';
echo $que->deque();
echo '<br>';
var_dump($que->getQue());
echo '</pre>';

