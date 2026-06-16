
<?php
// 商品一覧
if (!empty($_SESSION['product'])) {
    echo '<table>';
    echo '<tr><th>商品番号</th><th>商品名</th><th>価格</th><th>個数</th><th>小計</th><th></th></tr>';
    $total = 0;
    foreach ($_SESSION['product'] as $id => $product) {
        $subtotal = $product['price'] * $product['count'];
        $total += $subtotal;
        echo '<tr>';
        echo '<td>', $id, '</td>';
        echo '<td>', $product['name'], '</td>';
        echo '<td>', $product['price'], '</td>';
        echo '<td>', $product['count'], '</td>';
        echo '<td>', $subtotal, '</td>';
        echo '<td><a href="cart-delete.php?id=', $id, '">削除</a></td>';
        echo '</tr>';
    }
    echo '</table>';
    echo '<p>合計金額: ', $total, '円</p>';
} else {
    echo '<p>カートに商品が入っていません。</p>';
}
// $_SESSION['product'] にデータがあれば表示する
// id name price count を表示する
// 合計金額を表示する
// 商品詳細へのリンク detail.php
// 削除へのリンク cart-delete.php
?>
