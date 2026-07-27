<?php session_start(); ?>
<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<?php
require __DIR__ . '/../db.php';
$sql = $pdo->prepare('select * from product where id=?');

$sql->execute([$_REQUEST['id']]);
$tax_sql = $pdo->query('select * from tax_ratio');
$tax_row = $tax_sql->fetch();

foreach ($sql as $row) {
    echo '<div class="detail">';
    echo '<img src="image/', $row['id'], '.jpg" alt="', htmlspecialchars($row['name']), '" onerror="this.remove()">';
    echo '<form action="cart-insert.php" method="post" class="item-form">';
    echo '<p>商品番号：', $row['id'], '</p>';
    echo '<p>商品名：', $row['name'], '</p>';
    echo '<p>価格：', number_format(round((($row['price'] - $row['price'] * ($tax_row['sell_ratio'] / 100)) + $row['price'] * $tax_row['tax'] / 100))), '円</p>';
    echo '<p>個数：';

    echo '<input type="range" name="count" id="count" min="1" max="50" value="1" oninput="updateCountText(this.value)">'; //スライダー
    echo '<input type="text" name="count_text" id="count_text" value="1">'; //テキストボックス
    echo '</p>';

    echo '<input type="hidden" name="id" value="', $row['id'], '">';
    echo '<input type="hidden" name="name" value="', $row['name'], '">';
    echo '<input type="hidden" name="price" value="', round((($row['price'] - $row['price'] * ($tax_row['sell_ratio'] / 100)) + $row['price'] * $tax_row['tax'] / 100)), '">';
    echo '<p><input type="submit" value="カートに追加"></p>';
    echo '</form>';
    echo '</div>';

    echo '<p><a href="favorite-insert.php?id=', $row['id'],
    '">お気に入りに追加</a></p>';

    echo '<p><a href="review-input.php?id=', $row['id'],
    '">レビューを投稿する</a></p>';

    $review_sql = $pdo->prepare('select * from review where product_id=? order by created_at desc');
    $review_sql->execute([$row['id']]);
    $review_count = 0;
    $review_point = 0;
    $review_average = 0;

    foreach ($review_sql as $review) {
        $review_count++;
        $review_point += $review['rating'];
    }
    echo '<p>レビュー件数：', $review_count, '</p>';
    if ($review_count > 0) {
        $review_average = round($review_point / $review_count, 1);
        echo '<p>平均評価：★', $review_average, '</p>';
    } else {
        echo '<p>平均評価：レビューなし</p>';
    }


    $review_sql->execute([$row['id']]);

    foreach ($review_sql as $review) {
        echo '<div class="review">';
        echo '<p>', str_repeat('★', $review['rating']), '</p>';
        echo '<p>', htmlspecialchars($review['review_text']), '</p>';
        echo '<p>', $review['created_at'], '</p>';

        if (isset($_SESSION['customer']['id']) && $_SESSION['customer']['id'] == $review['customer_id']) {
            echo '<p><a href="review.delete.php?id=', $review['id'], '">削除</a></p>';
        }
        echo '</div>';
    }
}
?>
<?php require '../footer.php'; ?>
