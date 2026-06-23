<?php session_start(); ?>
<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<?php
if (!isset($_SESSION['customer'])) {
	echo '購入手続きを行うにはログインしてください。';
} else
if (empty($_SESSION['product'])) {
	echo 'カートに商品がありません。';
} else {

	$pdo = new PDO(
		'mysql:host=localhost;dbname=shop;charset=utf8',
		'staff',
		'password'
	);
	$sql = $pdo->query('select * from tax_ratio');
	$tax_row = $sql->fetch();


	echo '<p>お名前：', $_SESSION['customer']['name'], '</p>';
	echo '<p>ご住所：', $_SESSION['customer']['address'], '</p>';
	echo '<hr>';
	require 'cart.php';

	$point = round($total * $tax_row['point_ratio'] / 100);

	echo '<hr>';
	echo '<p>内容をご確認いただき、購入を確定してください。</p>';
	echo '<p>総額:', $total, '円</p>';
	echo '<p>セール後:', round($total - ($total * $tax_row['sell_ratio'] / 100), 0), '円</p>';
	echo '<p>獲得ポイント:', $point, 'ポイント</p>';
	echo '<a href="purchase-output.php">
	購入を確定する</a>';
}
?>
<?php require '../footer.php'; ?>
