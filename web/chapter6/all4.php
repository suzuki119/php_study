<?php require '../header.php'; ?>
<?php
$pdo=new PDO('mysql:host=localhost;dbname=shop;charset=utf8', 
	'staff', 'password');
// product テーブルからデータを取得
// foreach で順に表示する
// HTMLの表 table > tr > th/td を使う
?>
<?php require '../footer.php'; ?>
