<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<form action="product.php" method="post">
    商品検索
    <input type="text" name="keyword">
    <input type="submit" value="検索">
</form>
<hr>
<?php
echo '<table>';
echo '<tr><th>商品番号</th><th>商品名</th><th>価格</th></tr>';
$pdo = new PDO(
    'mysql:host=localhost;dbname=shop;charset=utf8',
    'staff',
    'password'
);
if (isset($_REQUEST['keyword'])) {
    $sql = $pdo->prepare('select * from product where name like ?');
    $sql->execute(['%' . $_REQUEST['keyword'] . '%']);
} else {
    $sql = $pdo->query('select * from product');

    $tax_sql = $pdo->query('select * from tax_ratio');
    $tax_row = $tax_sql->fetch();
}
foreach ($sql as $row) {
    $id = $row['id'];
    echo '<tr>';
    echo '<td>', $id, '</td>';
    echo '<td>';
    echo '<a href="detail.php?id=', $id, '">', $row['name'], '</a>';
    echo '</td>';
    echo '<td>', round(($row['price'] + $row['price'] * $tax_row['tax'] / 100) - ($row['price'] + $row['price'] * $tax_row['tax'] / 100) * $tax_row['sell_ratio'] / 100), '円</td>';
    echo '</tr>';
}
echo '</table>';
?>
<?php require '../footer.php'; ?>