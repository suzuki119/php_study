<?php session_start(); // セッションを使う宣言
?>
<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<?php
unset($_SESSION['customer']); // 古いセッションデータを削除
$pdo = new PDO(
	'mysql:host=localhost;dbname=shop;charset=utf8',
	'staff',
	'password'
);

$login = $_REQUEST['login'];
$password = $_REQUEST['password'];

$sql = $pdo->prepare('select * from customer where login = ? and password = ?');
$sql->execute([$login, $password]);

foreach ($sql as $row) {
	$_SESSION['customer'] = [
		'id' => $row['id'],
		'name' => $row['name'],
		'address' => $row['address'],
		'login' => $row['login'],
		'password' => $row['password']
	];
}
if (isset($_SESSION['customer'])) {
	echo 'ログインに成功しました。';
} else {
	echo 'ログイン名かパスワードが違います。';
}
// login と password が一致するデータを customer から検索する
// →存在すれば、そのユーザーでログイン
// →存在しなければ、ログイン名かパスワード間違い
// ユーザーの情報をセッションに保存する
?>
<?php require '../footer.php'; ?>
