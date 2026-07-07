
<?php
if (isset($_SESSION['customer'])) {
    $pdo = new PDO('mysql:host=localhost;dbname=shop;charset=utf8', 'staff', 'password');
    $tax_sql = $pdo->query('select * from tax_ratio');
    $tax_row = $tax_sql->fetch();

    $sql = $pdo->prepare('select * from favorite,product' . ' where customer_id=? and product_id=id');
    $sql->execute([$_SESSION['customer']['id']]);

    if ($sql->rowCount() == 0) {
        echo '<tr><td colspan="4">お気に入りはありません</td></tr>';
    } else {

        echo '<table>';
        echo '<tr><th>商品番号</th><th>商品名</th>';
        echo '<th>価格</th><th>操作</th></tr>';


        foreach ($sql as $row) {
            $id = $row['id'];
            echo '<tr>';
            echo '<td>', $id, '</td>';
            echo '<td> <a href="detail.php?id=', $id, '">', $row['name'], '</a></td>';
            echo '<td>', number_format(round($row['price'] + $row['price'] * $tax_row['tax'] / 100)), '円</td>';
            echo '<td><a href="favorite-delete.php?id=', $id, '">削除</a></td>';
            echo '</tr>';
        }
    }
    echo '</table>';
} else {
    echo 'お気に入りを表示するには、ログインしてください';
}

?>