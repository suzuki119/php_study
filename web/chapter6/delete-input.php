<?php require '../header.php'; ?>
<table>
	<tr>
		<th>商品番号</th>
		<th>商品名</th>
		<th>価格</th>
		<th></th>
	</tr>
	<?php
	$pdo = new PDO(
		'mysql:host=localhost;dbname=shop;charset=utf8',
		'staff',
		'password'
	);
	// データベースから商品一覧を取得する
	// 商品ごとに、削除ボタン
	// 商品id は hidden で渡す
	// delete-output.phpへ移動
	$sql = $pdo->query('select * from product');
	$sql->execute();
	foreach ($sql as $row) {
		echo '<tr>';
		echo '<td>', $row['id'], '</td>';
		echo '<td>', $row['name'], '</td>';
		echo '<td>', $row['price'], '</td>';
		echo '<td>';
		echo '<form action="delete-output.php" method="post">';
		echo '<input type="hidden" name="id" value="', $row['id'], '">';
		echo '<input type="submit" value="削除">';
		echo '</form>';
		echo '</td>';
		echo '</tr>';
	}
	?>
</table>
<?php require '../footer.php'; ?>