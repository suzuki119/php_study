<?php require '../header.php'; ?>
<?php
$pdo=new PDO('mysql:host=localhost;dbname=shop;charset=utf8', 
	'staff', 'password');
// 入力データ name は空でない
// 入力データ price は数値
// 入力データ name price をデータベースに登録する
// データベースには、prepare と execute の2段階で
// 成功／失敗を表示する。sqlの実行に成功するとtrueが返る→ifの判定をsqlの実行にする
// 余力のある人は、数値1以上
?>
<?php require '../footer.php'; ?>
