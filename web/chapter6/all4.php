<?php require '../header.php'; ?>
<?php
$pdo = new PDO(
	'mysql:host=localhost;dbname=shop;charset=utf8',
	'staff',
	'password'
);
// product テーブルからデータを取得

$sql = $pdo->query('select * from product');

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


// foreach で順に表示する
// HTMLの表 table > tr > th/td を使う
?>
<?php require '../footer.php'; ?>
