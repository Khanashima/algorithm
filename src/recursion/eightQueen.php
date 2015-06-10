<?php

/* 
互いに取り合えないように8個のクィーンを8x8のチェス盤に配置せよ
 */
require_once '../part/Queen.php';

$queen = new Queen();

$queen->set(0);

echo '答えは全部で' . $queen->getCount() . '個です。';