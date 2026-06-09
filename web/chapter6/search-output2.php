<?php require '../header.php'; ?>
<?php
$pdo=new PDO('mysql:host=localhost;dbname=shop;charset=utf8', 
	'staff', 'password');
// 入力データ keyword で検索する
// 部分一致検索 name like と %
// データベースには、prepare と execute の2段階で
// 出力はHTML表形式
// 余力のある人は、検索された語も表示する
?>
<?php require '../footer.php'; ?>
