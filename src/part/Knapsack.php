<?php

/*
ナップザック
 */

class Knapsack {
    public $knapsack;      //ナップザック
    public $knapsackCount; //ナップザックの容量
    public $products;      //商品。商品はサイズと価値がある

    public function __construct($capacity) {
        $this->knapsack      = array_fill(0, $capacity + 1, 0);
        $this->knapsackCount = $capacity;
        $this->product       = array();
    }

    public function addProduct($size, $value) {
        $this->products[] = array('size' => $size, 'value' => $value);
    }

    public function solveKnapsack() {
        //ナップザックに詰め込んだ時の値を初期化
        $napValue = array_fill(0, $this->knapsackCount + 1, 0);

        //ナップザックの容量を表示する
        echo '<table  border="1" frame="box">';
        echo '<tr>';
        echo '<th>ナップサックの大きさ</th>';
        for ($i = 1; $i < $this->knapsackCount + 1; $i++) {
            echo '<td>' . $i . '</td>';
        }
        echo '</tr>';

        //扱う商品を1つずつ増やしていく
        $productCount = count($this->products);
        for ($i = 0; $i < $productCount; $i++) {
            //$napIndexの初期値は商品のサイズから。
            for ($napIndex = $this->products[$i]['size']; $napIndex < $this->knapsackCount + 1; $napIndex++) {
                $newValue = $napValue[$napIndex - $this->products[$i]['size']] + $this->products[$i]['value'];
                if ($newValue > $napValue[$napIndex]) {
                    $napValue[$napIndex] = $newValue;
                }
            }
            //表示
            echo '<tr><th>' . ($i + 1) . '番目の商品まで使用</th>';
            for ($napIndex = 1; $napIndex < $this->knapsackCount + 1; $napIndex++) {
                echo '<td>' . $napValue[$napIndex]. '</td>';
            }
            echo '</tr>';
        }
        echo '</table>';
    }
}
