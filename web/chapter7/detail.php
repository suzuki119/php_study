<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<?php
$pdo = new PDO(
	'mysql:host=localhost;dbname=shop;charset=utf8',
	'staff',
	'password'
);
// idで指定された商品を取得

$id = $_REQUEST['id'];

$sql = $pdo->prepare('select * from product where id = ?');
$sql->execute([$id]);

foreach ($sql as $row) {
	$name = $row['name'];
	$price = $row['price'];
}

if (!isset($name)) {
	echo '商品が見つかりませんでした。';
	require '../footer.php';
	exit;
} else {


	// フォーム
	// 商品画像 image/●.jpg ●は id
	if (file_exists('./image/' . $id . '.jpg')) {
		echo '<img src="./image/' . $id . '.jpg">';
	} else {
		echo '<img src="./image/no-image.jpg">';
	}
	// 商品番号、商品名、価格。画面表示は単純テキスト、hiddenで渡す
	echo '<p>商品番号: ', $id, '</p>';
	echo '<p>商品名: ', $name, '</p>';
	echo '<p>価格: ', $price, '円</p>';

	// 個数 1-10
	echo '<form action="cart-insert.php" method="post">';
	echo '<select name="count">';
	for ($i = 1; $i <= 10; $i++) {
		echo '<option value="', $i, '">', $i, '</option>';
	}
	echo '</select>';
	echo '<input type="hidden" name="id" value="', $id, '">';
	echo '<input type="hidden" name="name" value="', $name, '">';
	echo '<input type="hidden" name="price" value="', $price, '">';
	echo '<br >';

	// 追加ボタン
	echo '<input type="submit" value="カートに追加">';
	echo '</form>';
	// cart-insert.phpへ移動

	// お気に入り追加リンク favorite-insert.php

	echo '<a href="favorite-insert.php?id=', $row['id'], '">お気に入りに追加</a>';
}

// 余力のある人は、idが空だった場合の処理
//                 idがデータベースに存在しない場合
//                 お気に入りに既に登録されているか
?>
<?php require '../footer.php'; ?>
