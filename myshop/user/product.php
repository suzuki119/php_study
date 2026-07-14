<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<form action="product.php" method="post" class="search-form">
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
    $tax_sql = $pdo->query('select * from tax_ratio');
    $tax_row = $tax_sql->fetch();
} else {
    $sql = $pdo->query('select * from product');
    $tax_sql = $pdo->query('select * from tax_ratio');
    $tax_row = $tax_sql->fetch();
}
foreach ($sql as $row) {
    $id = $row['id'];
    $review_sql = $pdo->prepare('select * from review where product_id=?');
    $review_sql->execute([$id]);

    $review_count = 0;
    $review_sum = 0;
    foreach ($review_sql as $review) {
        $review_count++;
        $review_sum += $review['rating'];
    }

    echo '<tr>';
    echo '<td>', $id, '</td>';
    echo '<td>';
    echo '<a href="detail.php?id=', $id, '">', $row['name'], '</a>';
    echo '</td>';
    echo '<td>', number_format(round((($row['price'] - $row['price'] * ($tax_row['sell_ratio'] / 100)) + $row['price'] * $tax_row['tax'] / 100))), '円</td>';
    echo '<td>';
    if ($review_count > 0) {
        $review_average = round($review_sum / $review_count, 1);
        echo '★', $review_average;
    } else {
        echo 'レビューなし';
    }
    echo '</td>';
    echo '</tr>';
}
echo '</table>';
?>
<?php require '../footer.php'; ?>