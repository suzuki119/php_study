<?php require '../header.php'; ?>
<div class="th0">商品番号</div>
<div class="th1">商品名</div>
<div class="th1">価格</div><br>
<?php
$pdo = new PDO(
	'mysql:host=localhost;dbname=shop;charset=utf8',
	'staff',
	'password'
);
// データ command の値 insert update delete で処理を変える

if (isset($_REQUEST['command'])) {
	if ($_REQUEST['command'] === 'update') {
		$sql = $pdo->prepare('update product set name = ?, price = ? where id = ?');
		$sql->execute([$_REQUEST['name'], $_REQUEST['price'], $_REQUEST['id']]);
	} elseif ($_REQUEST['command'] === 'delete') {
		$sql = $pdo->prepare('delete from product where id = ?');
		$sql->execute([$_REQUEST['id']]);
	} elseif ($_REQUEST['command'] === 'insert') {
		$sql = $pdo->prepare('insert into product values (null, ?, ?)');
		$sql->execute([$_REQUEST['name'], $_REQUEST['price']]);
	}
}

$sql = $pdo->query('select * from product');
foreach ($sql as $row) {
	echo '<form action="edit3.php" method="post">';
	echo '<input type="hidden" name="command" value="update">';
	echo '<div class="td0">', $row['id'], '</div>';
	echo '<div class="td1">', '<input type="text" name="name" value="', $row['name'], '"></div>';
	echo '<div class="td1">', '<input type="text" name="price" value="', $row['price'], '"></div>';
	echo '<input type="hidden" name="id" value="', $row['id'], '">';
	echo '<div class="td2"><input type="submit" value="更新"></div>';
	echo '</form>';
	echo '<form action="edit3.php" method="post">';
	echo '<input type="hidden" name="command" value="delete">';
	echo '<input type="hidden" name="id" value="', $row['id'], '">';
	echo '<div class="td2"><input type="submit" value="削除"></div>';
	echo '</form>';
	echo '<br>';
}

// データベースから商品一覧を取得する
// 商品ごとに、name price 更新ボタン
// 商品id は hidden で渡す
// hidden で、command 値は update
// edit3.phpへ移動
// ※ edit2.phpと同じ
?>
<form action="edit3.php" method="post">
	<input type="hidden" name="command" value="insert">
	<div class="td0"></div>
	<div class="td1"><input type="text" name="name"></div>
	<div class="td1"><input type="text" name="price"></div>
	<div class="td2"><input type="submit" value="追加"></div>
</form><br>
<!--
フォーム
項目 name price 追加
hidden で、command 値は insert
edit3.phpへ移動
※ edit.php と同じ
-->
<?php require '../footer.php'; ?>