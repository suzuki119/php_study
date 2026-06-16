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
// データベースから商品一覧を取得する

$sql = $pdo->query('select * from product');
// 商品ごとに、name price 更新ボタン
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
// 商品id は hidden で渡す
// hidden で、command 値は update
// edit3.phpへ移動
?>
<!--
フォーム
項目 name price 追加
hidden で、command 値は insert
edit3.phpへ移動
※ edit.php と同じ
-->
<?php require '../footer.php'; ?>