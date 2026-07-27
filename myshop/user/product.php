<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<form action="product.php" method="post" class="search-form">
    <label for="keyword">商品検索</label>
    <input type="text" name="keyword" id="keyword" placeholder="商品名で探す"
        value="<?= isset($_REQUEST['keyword']) ? htmlspecialchars($_REQUEST['keyword']) : '' ?>">
    <input type="submit" value="検索">
</form>
<?php
require __DIR__ . '/../db.php';
if (isset($_REQUEST['keyword'])) {
    $sql = $pdo->prepare('select * from product where name like ?');
    $sql->execute(['%' . $_REQUEST['keyword'] . '%']);
} else {
    $sql = $pdo->query('select * from product');
}
$tax_sql = $pdo->query('select * from tax_ratio');
$tax_row = $tax_sql->fetch();

$products = $sql->fetchAll();

if (count($products) == 0) {
    echo '<p class="empty">商品が見つかりませんでした。</p>';
} else {
    echo '<div class="product-grid">';
    foreach ($products as $row) {
        $id = $row['id'];
        $review_sql = $pdo->prepare('select * from review where product_id=?');
        $review_sql->execute([$id]);

        $review_count = 0;
        $review_sum = 0;
        foreach ($review_sql as $review) {
            $review_count++;
            $review_sum += $review['rating'];
        }

        $price = number_format(round((($row['price'] - $row['price'] * ($tax_row['sell_ratio'] / 100)) + $row['price'] * $tax_row['tax'] / 100)));

        echo '<a class="card" href="detail.php?id=', $id, '">';
        echo '<div class="card-thumb">';
        echo '<img src="image/', $id, '.jpg" alt="', htmlspecialchars($row['name']), '" onerror="this.remove()">';
        echo '</div>';
        echo '<div class="card-body">';
        echo '<h2 class="card-name">', htmlspecialchars($row['name']), '</h2>';
        echo '<div class="card-meta">';
        echo '<span class="price">', $price, '<small>円</small></span>';
        if ($review_count > 0) {
            $review_average = round($review_sum / $review_count, 1);
            echo '<span class="rating">★', $review_average, '</span>';
        } else {
            echo '<span class="rating is-none">レビューなし</span>';
        }
        echo '</div>';
        echo '</div>';
        echo '</a>';
    }
    echo '</div>';
}
?>
<?php require '../footer.php'; ?>