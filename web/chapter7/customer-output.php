<?php session_start(); ?>
<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<?php
$pdo = new PDO(
	'mysql:host=localhost;dbname=shop;charset=utf8',
	'staff',
	'password'
);
$name = $_REQUEST['name'];
$address = $_REQUEST['address'];
$login = $_REQUEST['login'];
$password = $_REQUEST['password'];

$sql = $pdo->prepare('insert into customer values (null, ?, ?, ?, ?)');
// ●ログイン名の被りチェック
if (isset($_SESSION['customer'])) {
	// ログインしている場合は、idが異なる&ログイン名が同じユーザーを探す
	$sql = $pdo->prepare('select * from customer where id != ? and login = ?');
	$sql->execute([$_SESSION['customer']['id'], $login]);
} else {
	// ログインしていない場合は、ログイン名が同じユーザーを探す
	$sql = $pdo->prepare('select * from customer where login = ?');
	$sql->execute([$login]);
}
// ログインしているか判定する
// →ログインしている
//   idが異なる&ログイン名が同じユーザーを探す
// →ログインしていない
//   ログイン名が同じユーザーを探す
// →→もし見つかれば、ログイン名が被っている

// ●ログインしていれば更新、ログインしていなければ登録
// 余力のある人は、文字数や文字種のチェックをする
?>
<?php require '../footer.php'; ?>
