<?php session_start(); ?>
<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<?php
	$pdo=new PDO('mysql:host=localhost;dbname=shop;charset=utf8', 
		'staff', 'password');

// ログインしている場合のみ購入履歴を表示
// purchase テーブルを、セッションの顧客idで絞り込む
// →絞り込み結果の購入id(複数ありえる)で、purchase_detailを絞り込む
// →purchase_detailから取得した商品名(複数ありえる)、個数、金額を表示する
?>
<?php require '../footer.php'; ?>
