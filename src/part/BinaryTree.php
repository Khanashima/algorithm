<?php

/*
バイナリーツリー
 */

require_once 'TreeNode.php';

class BinaryTree {
    public static function createNewNode($value) {
        $node            = new TreeNode();
        $node->value     = $value;
        $node->leftNode  = null;
        $node->rightNode = null;
        return $node;
    }

    public static function insertNode($value, $node) {
        if ($node->value == $value) {
            return false;
        }

        if ($node->value > $value) {
            //ノードの値より小さい時。左の子のノードに
            if ($node->leftNode != null) {
                //既に左のノードにデータがある時、次のノードに進む
                self::insertNode($value, $node->leftNode);
            } else {
                //左のノードにデータを挿入
                $node->leftNode = self::createNewNode($value);
                return true;
            }
        } else {
            //ノードの値より大きい時。右の子のノードに
            if ($node->rightNode != null) {
                //既に右のノードにデータがある時、次のノードに進む
                self::insertNode($value, $node->rightNode);
            } else {
                //右のノードにデータを挿入
                $node->rightNode = self::createNewNode($value);
                return true;
            }
        }
    }

    public static function find($value, $node) {
        if ($node->value == $value) {
            //値が見つかった時
            return true;
        }

        if ($node->value > $value) {
            if (empty($node->leftNode)) {
                return false;
            }
            //探している値が対象のノードより小さい時は左のノードへ
            return self::find($value, $node->leftNode);
        } else {
            if (empty($node->rightNode)) {
                return false;
            }
            //右のノードへ
            return self::find($value, $node->rightNode);
        }
    }

    public static function delete($value, &$tree) {
        $rootNode  = &$tree; //ルートノードのアドレス
        $node      = &$tree; //1個ずつ調べ、最後は削除対象のノード
        $parent    = null;   //$nodeの親のノードのアドレス
        $direction = 0; //根の場合は0。左の子に進む時は-1を右の時は1

        //削除対象のノードを探索
        while ($node !== null && $node->value != $value) {
            if ($node->value > $value) {
                $parent    = &$node;
                $node      = &$node->leftNode;
                $direction = -1;
            } else {
                $parent    = &$node;
                $node      = &$node->rightNode;
                $direction = 1;
            }
        }
        //削除対象が木に無かった時
        if ($node == null) {
            return false;
        }

        //削除対象のノードがある時
        if ($node->leftNode == null && $node->rightNode == null) {
            //右と左のノードが無い時。つまり、リーフを削除
            if ($direction == -1) {
                $parent->leftNode = null;
            } else {
                $parent->rightNode = null;
            }
        } else if ($node->leftNode == null && $node->rightNode != null) {
            //左のノードが無くかつ右のノードがある時
            if ($direction == -1) {
                $parent->leftNode = $node->rightNode;
            } else if ($direction == 1) {
                $parent->rightNode = $node->rightNode;
            } else if ($direction == 0) {
                //木構造で右のノードしかなくルートを削除する時
                $rootNode = $node->rightNode;
            }
        } else if ($node->leftNode != null && $node->rightNode == null) {
            //左のノードがあってかつ右のノードが無い時
            if ($direction == -1) {
                $parent->leftNode = $node->leftNode;
            } else if ($direction == 1) {
                $parent->rightNode = $node->leftNode;
            } else if ($direction == 0) {
                //木構造で左のノードしかなくルートを削除する時
                $rootNode = $node->leftNode;
            }
        } else {
            //右と左の子がある場合。
            //左のノードの最大値と削除したいノードと交換する
            $leftBiggest = &$node->leftNode;
            $parent = &$node;
            $direction = -1;
            //右のノードがある限り上書きしていく。
            while ($leftBiggest->rightNode != null) {
                $parent = &$leftBiggest;
                $leftBiggest = &$leftBiggest->rightNode;
                $direction = 1;
            }

            $node->value = $leftBiggest->value;
            if ($direction == -1) {
                $parent->leftNode = &$leftBiggest->leftNode;
            } else {
                $parent->rightNode = &$leftBiggest->leftNode;
            }
        }
        return true;
    }
}
