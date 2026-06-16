<?php session_start(); ?>
<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<?php
// リクエストされた id の商品を削除する
// セッションのデータを unset
// 余力のある人は、idが実際に存在する商品か
unset($_SESSION['product'][$_REQUEST['id']]);
echo '<p>カートから商品を削除しました。</p>';

require 'cart.php'; // カートの商品一覧
?>
<?php require '../footer.php'; ?>
