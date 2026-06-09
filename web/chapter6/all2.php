<?php require '../header.php'; ?>
<?php
$pdo=new PDO('mysql:host=localhost;dbname=shop;charset=utf8', 
	'staff', 'password');
// product テーブルからデータを取得
// foreach で順に表示する
// 余力のある人は、価格順で並べ替える P262
?>
<?php require '../footer.php'; ?>
