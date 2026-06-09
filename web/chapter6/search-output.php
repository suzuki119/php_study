<?php require '../header.php'; ?>
<?php
$pdo=new PDO('mysql:host=localhost;dbname=shop;charset=utf8', 
	'staff', 'password');
// 入力データ keyword で検索する
// データベースには、prepare と execute の2段階で
// 出力はHTML表形式
?>
<?php require '../footer.php'; ?>
