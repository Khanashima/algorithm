<?php

/*
7パズルを解くクラス
 */
require 'Pattern.php';

class SevenPuzzle {
    public $history;
    public $queueBottom;
    const ANSWER = '1,2,3,4,5,6,7,0';

    public function __construct() {
        $this->history     = array();
        $this->queueBottom = 0;
    }

    public function createBlockLine($patternArray) {
        return implode(',', $patternArray);
    }
    
    public function revertPattern($blockLine) {
        return explode(',', $blockLine);
    }
    
    public function saveHistory($patternArray, $patternFrom) {
        $blockLine = self::createBlockLine($patternArray);
        //既に登録されていたら何もしない
        for ($i=0; $i < count($this->history); $i++) {
            if ($this->history[$i]->blockLine == $blockLine) {
                return false;
            }
        }
        $this->history[] = new Pattern($blockLine, $patternFrom);
    }
    
    public function solveSevenPuzzle() {
        $patternArray = array();
        $blankPos     = 0;

        //パターンが空になるまで探索を行う。
        while ($this->queueBottom != count($this->history)) {
            $blockLine = $this->history[$this->queueBottom]->blockLine;
            if ($blockLine == self::ANSWER) {
                //history配列のキーを返す。
                return $this->queueBottom;
            }
            $patternArray    = self::revertPattern($blockLine);
            //移動する前のパターンを控える
            $patternArrayOrg = self::revertPattern($blockLine);
            
            //ボックスに0(空白)がある位置を特定する
            for ($blankPos =0; $blankPos < 8; $blankPos++) {
                if ($patternArray[$blankPos] == 0) {
                    break;
                }
            }
            
            if ($blankPos > 3) {
                //下に空があって上のブロックを下にずらず
                $patternArray[$blankPos]   = $patternArray[$blankPos-4];
                $patternArray[$blankPos-4] = 0;
                self::saveHistory($patternArray, $this->queueBottom);
                //配列を移動する前に戻す
                $patternArray = $patternArrayOrg;
            }
            
            if ($blankPos < 4) {
                //上に空があって下のブロックを上にずらず
                $patternArray[$blankPos]     = $patternArray[$blankPos + 4];
                $patternArray[$blankPos + 4] = 0;
                self::saveHistory($patternArray, $this->queueBottom);
                //配列を移動する前に戻す
                $patternArray = $patternArrayOrg;
            }

            if ($blankPos != 0 && $blankPos != 4) {
                //右にずらず。右から持っていくの右端が空の時は何もしない
                $patternArray[$blankPos]     = $patternArray[$blankPos - 1];
                $patternArray[$blankPos - 1] = 0;
                self::saveHistory($patternArray, $this->queueBottom);
                //配列を移動する前に戻す
                $patternArray = $patternArrayOrg;
            }
            
            if ($blankPos != 3 && $blankPos != 7) {
                //左にずらず。左から持っていくの左端が空の時は何もしない
                $patternArray[$blankPos]     = $patternArray[$blankPos + 1];
                $patternArray[$blankPos + 1] = 0;
                self::saveHistory($patternArray, $this->queueBottom);
                //配列を移動する前に戻す
                $patternArray = $patternArrayOrg;
            }
            $this->queueBottom++;
        }
        //見つからなかった
        return false;
    }
    
    public function showAnswer($pattern, $endIndex = null) {
        if ($endIndex != null) {
            $patternNo = $endIndex;
            self::showBlock($this->history[$patternNo]->blockLine);
            echo '<br><br>';
        }
        $patternNo = $pattern->patternFrom;
        self::showBlock($this->history[$patternNo]->blockLine);
        echo '<br><br>';
        if ($patternNo == 0) {
            //最初にたどり着いたから終了
            return true;
        }
        $pattern = $this->history[$patternNo];
        self::showAnswer($pattern);
    }
    
    public function showBlock($blockLine) {
        echo (substr($blockLine, 0, 7));
        echo '<br>';
        echo (substr($blockLine, 8, 7));
    }
}
