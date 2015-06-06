<?php
require_once 'Bucket.php';

/* 
 * ハッシュのボックス
 * キーはハッシュ値
 * 値はBucketオブジェクト
 */

class chainHashBox {
    private $size; //ボックスのサイズ
    private $list; //ボックス

    /**
     *  コンストラクタ
     * @param int  size ボックスのサイズ
     * 
     */
    public function __construct($size) {
        $this->list = array_fill(0, $size, null);
        $this->size = $size;
        
    }

    public function createHashCode($value) {
        $hashCode = $value % $this->size;
        return (int)$hashCode;
    }

    public function getList() {
        return $this->list;
    }

    /**
     * ハッシュボックスに値を追加する
     * @param int $value 値
     * 
     * @return Bool 追加成功の時true
     *               追加済みの時false
     */
    public function add($value) {
        $key = self::createHashCode($value);
        $address = null;
        if ($this->list[$key]) {
            $address = $this->list[$key];
        }
        while($address != null) {
            if($address->getValue() == $value) {
                return false;
            }
            
            if ($address->getValue() == null) {
                break;
            }
            $address = $address->getNextAddress();
        }
        $this->list[$key] = new Bucket($value, $this->list[$key]);
        return true;
    }

    /**
     * 値を探す
     * @param int $value 探したい値
     * 
     * @return int  探索に成功した時ハッシュボックスのキー
     *                     失敗した時nullを返す
     */
    public function search($value) {
        $key = self::createHashCode($value);
        $address = null;
        if ($this->list[$key]) {
            $address = $this->list[$key];
        }
        while($address!= null) {
                //var_dump($this->list[$key]->getValue());
                //var_dump($value);
                //exit('');
            if($address->getValue() == $value) {
                return $key;
            }
            $address = $address->getNextAddress();
            //var_dump($address);
            //exit('');
        }
        return null;
    }

}