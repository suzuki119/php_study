<?php session_start(); // セッションを使う宣言 ?>
<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<?php
unset($_SESSION['customer']); // 古いセッションデータを削除
$pdo=new PDO('mysql:host=localhost;dbname=shop;charset=utf8', 
	'staff', 'password');
// login と password が一致するデータを customer から検索する
// →存在すれば、そのユーザーでログイン
// →存在しなければ、ログイン名かパスワード間違い
// ユーザーの情報をセッションに保存する
?>
<?php require '../footer.php'; ?>
