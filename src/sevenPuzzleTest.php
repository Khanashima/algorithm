<?php

/* 
幅優先探索法を用いて7パズルを解く
問題
12345670のブロックを一度混ぜて、12345670に並べる最短の経路を出せ
 */

require_once './part/SevenPuzzle.php';

$savenPuzzle = new SevenPuzzle();
$firstValue = array(1,2,3,4,5,6,0,7);//1回目
$firstValue = array(1,2,0,4,5,6,3,7);//2回目
$firstValue = array(1,0,2,4,5,6,3,7);//3回目
$firstValue = array(0,1,2,4,5,6,3,7);//4回目
$firstValue = array(5,1,2,4,0,6,3,7);//5回目
$firstValue = array(5,1,2,4,6,0,3,7);//6回目
$firstValue = array(5,1,2,4,6,3,7,0);//7回目
$firstValue = array(5,1,2,0,6,3,7,4);//8回目

$savenPuzzle->saveHistory($firstValue,-1);

$endIndex = $savenPuzzle->solveSevenPuzzle();
$savenPuzzle->showAnswer($savenPuzzle->history[$endIndex], $endIndex);
