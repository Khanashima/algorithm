<?php

/* 
 * チェイン法のオブジェクト
 */

class Bucket {
    private $value;
    private $next;

    /**
     *  コンストラクタ
     * @param int    $value 値
     * @param Bucket $next  次のBucketブジェクト
     * 
     */
    public function __construct($value, $next) {
        $this->value = $value;
        $this->next  = $next;
    }

    public function getValue() {
        return $this->value;
    }

    public function getNextAddress() {
        return $this->next;
    }
}