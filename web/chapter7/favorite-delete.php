<?php session_start(); ?>
<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<?php
$pdo = new PDO(
	'mysql:host=localhost;dbname=shop;charset=utf8',
	'staff',
	'password'
);


require 'favorite.php'; // お気に入り一覧

// ログインしているか判定する
if (isset($_SESSION['customer'])) {
	$sql = $pdo->prepare('delete from favorite where customer_id=? and product_id=?');
	$sql->execute([$_SESSION['customer']['id'], $_REQUEST['id']]);
	echo '<p>お気に入りから商品を削除しました。</p>';
} else {
	echo '<p>お気に入りから商品を削除するには、ログインしてください</p>';
}
// →ログインしていれば、
//   リクエストされた id をお気に入りから削除
//   現在ログインしているユーザーと、商品idとを指定して削除

?>
<?php require '../footer.php'; ?>
