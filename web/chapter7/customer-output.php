<?php session_start(); ?>
<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<?php
$pdo=new PDO('mysql:host=localhost;dbname=shop;charset=utf8', 
	'staff', 'password');
// ●ログイン名の被りチェック
// ログインしているか判定する
// →ログインしている
//   idが異なる&ログイン名が同じユーザーを探す
// →ログインしていない
//   ログイン名が同じユーザーを探す
// →→もし見つかれば、ログイン名が被っている

// ●ログインしていれば更新、ログインしていなければ登録
// 余力のある人は、文字数や文字種のチェックをする
?>
<?php require '../footer.php'; ?>
