<?php
// お気に入り一覧

if (isset($_SESSION['customer'])) {

	$pdo = new PDO(
		'mysql:host=localhost;dbname=shop;charset=utf8',
		'staff',
		'password'
	);
	$sql = $pdo->prepare('select * from favorite,product' . ' where customer_id=? and product_id=id');
	$sql->execute([$_SESSION['customer']['id']]);

	echo '<table>';
	echo '<tr>';
	echo '<th>商品ID</th>';
	echo '<th>商品名</th>';
	echo '<th>価格</th>';
	echo '</tr>';

	foreach ($sql as $row) {
		$id = $row['id'];
		echo '<tr>';
		echo '<td>', $id, '</td>';
		echo '<td><a href="detail.php?id=', $id, '">', $row['name'], '</a></td>';
		echo '<td>', $row['price'], '</td>';
		echo '<td><a href="favorite-delete.php?id=', $id, '">削除</a></td>';
		echo '</tr>';
	}
	echo '</table>';
} else {
	echo 'お気に入りを表示するには、ログインしてください';
}

// ログインしているか判定する
// →ログインしていれば、
//   現在ログインしているユーザーのお気に入り一覧を表示する
//   商品詳細へのリンク detail.php
//   お気に入りから削除リンク favorite-delete.php
