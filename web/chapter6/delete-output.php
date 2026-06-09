<?php require '../header.php'; ?>
<?php
$pdo=new PDO('mysql:host=localhost;dbname=shop;charset=utf8', 
	'staff', 'password');
// データベースには、prepare と execute の2段階で
// 成功／失敗を表示する。sqlの実行に成功するとtrueが返る→ifの判定をsqlの実行にする
// 余力のある人は、id が適切か判定する
// → id が数値、1以上
// → id がデータベースに存在する
?>
<?php require '../footer.php'; ?>
