<?php session_start(); // セッションを使う宣言
?>
<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<?php
// ログアウトする = セッションデータを削除する
unset($_SESSION['customer']);
echo 'ログアウトしました。';
?>
<?php require '../footer.php'; ?>
