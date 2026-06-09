<?php require '../header.php'; ?>
<?php
$pdo=new PDO('mysql:host=localhost;dbname=shop;charset=utf8', 
	'staff', 'password');
// 入力データ name price をデータベースに登録する
// データベースには、prepare と execute の2段階で
// 成功／失敗を表示する。sqlの実行に成功するとtrueが返る→ifの判定をsqlの実行にする
?>
<?php require '../footer.php'; ?>
