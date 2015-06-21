<?php

/*
2分木のテスト
 */

require_once './../part/TreeNode.php';
require_once './../part/BinaryTree.php';

$tree = new TreeNode();
$tree->value = 1000;
BinaryTree::insertNode(2000, $tree);
BinaryTree::insertNode(300, $tree);
BinaryTree::insertNode(4000, $tree);
BinaryTree::insertNode(5000, $tree);
BinaryTree::insertNode(100, $tree);
BinaryTree::insertNode(50, $tree);
BinaryTree::insertNode(10, $tree);
BinaryTree::insertNode(200, $tree);
BinaryTree::insertNode(400, $tree);
echo '<pre>';
var_dump($tree);
echo '</pre>';

echo '<br>';
echo 'ここから検索テスト';
var_dump(BinaryTree::find(1000, $tree));
var_dump(BinaryTree::find(2000, $tree));
var_dump(BinaryTree::find(300, $tree));
var_dump(BinaryTree::find(4000, $tree));
var_dump(BinaryTree::find(5000, $tree));
var_dump(BinaryTree::find(100, $tree));
var_dump(BinaryTree::find(50, $tree));
var_dump(BinaryTree::find(10, $tree));
var_dump(BinaryTree::find(200, $tree));
var_dump(BinaryTree::find(400, $tree));
var_dump(BinaryTree::find(1, $tree));
echo '<br>';
echo 'ここから消去テスト';
var_dump(BinaryTree::delete(1, $tree));
echo '<br>';
//リーフの削除テスト
//var_dump(BinaryTree::delete(400, $tree));
//右のノードしかない時の削除テスト
//var_dump(BinaryTree::delete(2000, $tree));
//左のノードしかない時の削除テスト
//var_dump(BinaryTree::delete(50, $tree));
//右と左のノードがある時のテスト
//var_dump(BinaryTree::delete(300, $tree));
//右と左のノードがある時のテスト
////var_dump(BinaryTree::delete(100, $tree));
//ルートの削除テスト
//var_dump(BinaryTree::delete(1000, $tree));
//木を左のノードしかないようにしてルートを削除
//木を右のノードにしてルートを削除
var_dump(BinaryTree::delete(1000, $tree));

echo '<pre>';
var_dump($tree);
echo '</pre>';