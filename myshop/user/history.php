<?php session_start(); ?>
<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<?php

if (isset($_SESSION['customer'])) {

    require __DIR__ . '/../db.php';

    $sql_purchase = $pdo->prepare(
        'select * from purchase where customer_id=? order by id desc'
    ); // purchaseテーブルに繋げ、purchase_detailテーブルと結合して、購入の詳細情報を取得するためのSQL文を準備しています。purchase_idでフィルタリングし、productテーブルと結合して、商品情報も取得しています。

    $sql_purchase->execute([$_SESSION['customer']['id']]);
    foreach ($sql_purchase as $row_purchase) {
        $sql_detail = $pdo->prepare(
            'select * from purchase_detail,product ' .
                'where purchase_id=? and product_id=id'
        );
        $sql_detail->execute([$row_purchase['id']]);
        echo '<table>';
        echo '<tr><th>商品番号</th><th>商品名</th>',
        '<th>価格(税抜)</th><th>個数</th><th>小計</th></tr>';
        $total = 0;

        foreach ($sql_detail as $row_detail) {

            echo '<tr>';
            echo '<td>', $row_detail['id'], '</td>';
            echo '<td><a href="detail.php?id=', $row_detail['id'], '">',
            $row_detail['name'], '</a></td>';
            echo '<td>', number_format($row_detail['price']), '</td>';
            echo '<td>', $row_detail['count'], '</td>';
            $subtotal = $row_detail['price'] * $row_detail['count'];
            $total += $subtotal;
            echo '<td>', number_format($subtotal), '</td>';
            echo '</tr>';
        }
        echo '<tr><td>合計</td><td></td><td></td><td></td><td>',
        number_format($total), '</td></tr>';
        echo '</table>';
        echo '<hr>';
    }
} else {
    echo '購入履歴を表示するには、ログインしてください。';
}
?>
<?php require '../footer.php'; ?>
