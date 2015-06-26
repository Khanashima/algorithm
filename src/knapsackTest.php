<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
</head>
<body>
<?php
require_once './part/Knapsack.php';

//ナップザックの容量を設定
$knapsack = new Knapsack(32);

//ナップザックの商品を追加
$knapsack->addProduct(2,2);
$knapsack->addProduct(3,4);
$knapsack->addProduct(5,7);
$knapsack->addProduct(6,10);
$knapsack->addProduct(9,30);

//ナップザックを解く
$knapsack->solveKnapsack();
?>
</body>
</html>