<?php

/* 
クィーンクラス
 */

Class Queen {
    private $answer;
    private $checkRowArray;
    private $checkRightdiagonalArray;
    private $checkLeftdiagonalArray;
    private $count;
    
    public function __construct() {
        $this->checkRowArray           = array_fill(0, 8, false);
        $this->checkRightdiagonalArray = array_fill(0, 16, false); 
        $this->checkLeftdiagonalArray  = array_fill(0, 16, false);
        $this->count=0;
    }
    
    public function display() {
        for ($i = 0; $i < 8; $i++) {
            echo $this->answer[$i];
        }
        echo '<br>';
    }
    
    public function set($row) {
        for ($column = 0; $column < 8; $column++) {
            if ($this->checkRowArray[$column] == false 
                    && $this->checkRightdiagonalArray[$row + $column] == false 
                    && $this->checkLeftdiagonalArray[$row - $column + 7] == false )
            {
                //クィーンをおける時
                $this->answer[$row] = $column;
                if ($row == 7) {
                    $this->count++;
                    self::display();
                }
                else {
                    $this->checkRowArray[$column]                      = true;
                    $this->checkRightdiagonalArray[$row + $column]     = true;
                    $this->checkLeftdiagonalArray[$row - $column + 7]  = true;
                    self::set($row + 1); //次の行
                    
                    //最後初期化
                    $this->checkRowArray[$column]                      = false;
                    $this->checkRightdiagonalArray[$row + $column]     = false;
                    $this->checkLeftdiagonalArray[$row - $column + 7]  = false;
                }
            }
        }
    }
    
    public function getCount() {
        return $this->count;
    }
}