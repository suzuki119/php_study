<?php session_start(); ?>
<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<?php

if (!isset($_SESSION['customer'])) {
    echo 'ログインしてください。';
} else {

    $product_id = $_REQUEST['id'];
    $pdo = new PDO(
        'mysql:host=localhost;dbname=shop;charset=utf8',
        'staff',
        'password'
    );
    $sql = $pdo->prepare('select * from product where id=?');
    $sql->execute([$product_id]);

    foreach ($sql as $row) {
        echo '<h2>', $row['name'], '</h2>';
        echo '<img alt="image" src="image/', $row['id'], '.jpg">';
    }
    echo '<form action="review-output.php" method="post" class="item-form">';

    // どの商品へのレビューかをサーバーに送るための隠しフィールド
    echo '<input type="hidden" name="product_id" value="', $product_id, '">';

    // 星評価（1〜5）
    echo '<p>評価：<select name="rating">';
    for ($i = 1; $i <= 5; $i++) {
        echo '<option value="', $i, '">', $i, 'つ星</option>';
    }
    echo '</select></p>';

    // レビュー本文
    echo '<p>レビュー：<br>';
    echo '<textarea name="review_text" rows="5" cols="40" placeholder="レビューを入力してください。"></textarea></p>';
    echo '<p><input type="submit" value="投稿する"></p>';
    echo '</form>';
}
?>
<?php require '../footer.php'; ?>