<?php require '../header.php'; ?>
<?php
$pdo = new PDO(
	'mysql:host=localhost;dbname=shop;charset=utf8',
	'staff',
	'password'
);

$id = $_REQUEST['id'];

$sql = $pdo->prepare('delete from product where id = ?');


if ($sql->execute([$id])) {
	echo '商品の削除に成功しました。';
} else {
	echo '商品の削除に失敗しました。';
}


// データベースには、prepare と execute の2段階で
// 成功／失敗を表示する。sqlの実行に成功するとtrueが返る→ifの判定をsqlの実行にする
// 余力のある人は、id が適切か判定する
// → id が数値、1以上
// → id がデータベースに存在する
?>
<?php require '../footer.php'; ?>
