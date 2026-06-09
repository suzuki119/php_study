<?php session_start(); ?>
<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<?php
$pdo=new PDO('mysql:host=localhost;dbname=shop;charset=utf8', 
	'staff', 'password');
$purchase_id=1;
// select max(id) from purchase で、今あるデータの最大値を取得する
// $purchase_id を最大値+1にする
// 
// purchase に、$purchase_id と顧客idを挿入する
// purchase_detail に $purchase_id と商品id、個数を挿入する
//                   商品は複数あり得るので、foreachループで挿入
?>
<?php require '../footer.php'; ?>
