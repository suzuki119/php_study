<?php require '../header.php'; ?>
<?php
$pdo = new PDO(
	'mysql:host=localhost;dbname=shop;charset=utf8',
	'staff',
	'password'
);
// 入力データ keyword で検索する
// データベースには、prepare と execute の2段階で
// 出力はHTML表形式
$keyword = $_REQUEST['keyword'];
$sql = $pdo->prepare('select * from product where name like ?');
$sql->execute([$keyword]);


if ($sql->rowCount() > 0) {
	echo '<table>';
	echo '<tr><th>id</th><th>name</th><th>price
</th></tr>';
	foreach ($sql as $row) {
		echo '<tr>';
		echo '<td>', $row['id'], '</td>';
		echo '<td>', $row['name'], '</td>';
		echo '<td>', $row['price'], '</td>';
		echo '</tr>';
	}
	echo '</table>';
} else {
	echo '「', $keyword, '」の検索結果はありませんでした。';
}

?>
<?php require '../footer.php'; ?>
