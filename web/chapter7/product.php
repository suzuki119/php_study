<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<!--
フォーム
項目 keyword
product.php(同じページ)へ移動
-->
<form action="product.php" method="post">
	<input type="text" name="keyword">
	<input type="submit" value="検索">
</form>
<hr>
<?php
$pdo = new PDO(
	'mysql:host=localhost;dbname=shop;charset=utf8',
	'staff',
	'password'
);
if (isset($_REQUEST['keyword'])) {
	$sql = $pdo->prepare('select * from product where name like ?');
	$sql->execute(['%' . $_REQUEST['keyword'] . '%']);
} else {
	$sql = $pdo->prepare('select * from product');
	$sql->execute();
}
// keyword が設定されていれば、部分一致で検索
// keyword が設定されていなければ、商品すべて

// 商品一覧を表示
echo '<table>';
echo '<tr><th>商品番号</th><th>商品名</th><th>価格(税抜)</th></tr>';
foreach ($sql as $row) {
	echo '<tr>';
	echo '<td>', $row['id'], '</td>';
	echo '<td><a href="detail.php?id=', $row['id'], '">', $row['name'], '</a></td>';
	echo '<td>', $row['price'], '円</td>';
	echo '</tr>';
}
echo '</table>';
// 詳細 detail.php へのリンク

// 余力のある人は、検索語の表示。検索して0件だったときの表示
?>
<?php require '../footer.php'; ?>