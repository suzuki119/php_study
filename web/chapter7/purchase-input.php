<?php session_start(); ?>
<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<?php
// 購入にはログインが必要

// ログインしていれば
// → カートに商品があるか判定
//    →商品があれば、名前と住所、カートの内容、購入リンク purchase-output.php を表示
?>
<?php require '../footer.php'; ?>
