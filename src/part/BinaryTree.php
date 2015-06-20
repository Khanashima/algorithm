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
            //ノードの値より小さい時。左の子の木に
            if ($node->leftNode != null) {
                //既に左の木にデータがある時、次の子に進む
                self::insertNode($value, $node->leftNode);
            } else {
                //左の木にデータを挿入
                $node->leftNode = self::createNewNode($value);
                return true;
            }
        } else {
            //ノードの値より大きい時。右の子の木に
            if ($node->rightNode != null) {
                //既に右の木にデータがある時、次の子に進む
                self::insertNode($value, $node->rightNode);
            } else {
                //右の木にデータを挿入
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
            //探している値が対象のノードより小さい時は左の木へ
            return self::find($value, $node->leftNode);
        } else {
            if (empty($node->rightNode)) {
                return false;
            }
            //右の木へ
            return self::find($value, $node->rightNode);
        }
    }
}
