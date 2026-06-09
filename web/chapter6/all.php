<?php require '../header.php'; ?>
<?php
// インストール・初期データ登録が完了していれば、何も表示されない
// 不備があればエラーが出る

$pdo=new PDO('mysql:host=localhost;dbname=shop;charset=utf8', 
	'staff', 'password');
?>
<?php require '../footer.php'; ?>
