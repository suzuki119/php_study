<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<?php
$pdo = new PDO(
    'mysql:host=localhost;dbname=shop;charset=utf8',
    'staff',
    'password'
);
$sql = $pdo->prepare('select * from product where id=?');

$sql->execute([$_REQUEST['id']]);
$tax_sql = $pdo->query('select * from tax_ratio');
$tax_row = $tax_sql->fetch();

foreach ($sql as $row) {
    echo '<p><img alt="image" src="image/', $row['id'], '.jpg"></p>';
    echo '<form action="cart-insert.php" method="post">';
    echo '<p>商品番号：', $row['id'], '</p>';
    echo '<p>商品名：', $row['name'], '</p>';
    echo '<p>価格：', round($row['price'] + $row['price'] * $tax_row['tax'] / 100), '円</p>';
    echo '<p>個数：<select name="count">';
    for ($i = 1; $i <= 10; $i++) {
        echo '<option value="', $i, '">', $i, '</option>';
    }
    echo '</select></p>';
    echo '<input type="hidden" name="id" value="', $row['id'], '">';
    echo '<input type="hidden" name="name" value="', $row['name'], '">';
    echo '<input type="hidden" name="price" value="', $row['price'] + $row['price'] * $tax_row['tax'] / 100, '">';
    echo '<p><input type="submit" value="カートに追加"></p>';
    echo '</form>';
    echo '<p><a href="favorite-insert.php?id=', $row['id'],
    '">お気に入りに追加</a></p>';
}
?>
<?php require '../footer.php'; ?>
