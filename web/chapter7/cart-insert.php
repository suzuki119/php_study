<?php session_start(); ?>
<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<?php
// データ id count をリクエストから取得
// セッションに商品の個数を登録。既にある場合は個数を増やす

// 余力のある人は、count の値のチェック
//                 id に対応する商品があるかチェック
echo '<hr>';
require 'cart.php'; // カートの商品一覧
?>
<?php require '../footer.php'; ?>
