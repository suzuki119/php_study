<?php session_start(); ?>
<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<?php
	$pdo=new PDO('mysql:host=localhost;dbname=shop;charset=utf8', 
		'staff', 'password');


require 'favorite.php'; // お気に入り一覧

// ログインしているか判定する
// →ログインしていれば、
//   リクエストされた id をお気に入りから削除
//   現在ログインしているユーザーと、商品idとを指定して削除

?>
<?php require '../footer.php'; ?>
