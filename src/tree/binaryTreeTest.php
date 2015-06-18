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
BinaryTree::insertNode(3000, $tree);
BinaryTree::insertNode(400, $tree);
echo '<pre>';
var_dump($tree);
echo '</pre>';