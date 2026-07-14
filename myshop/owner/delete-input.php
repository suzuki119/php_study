<?php require '../header.php'; ?>


<table>
    <tr>
        <th>id</th>
        <th>商品名</th>
        <th>価格</th>
    </tr>
    <?php

    $pdo = new PDO('mysql:host=localhost;dbname=shop;charset=utf8', 'staff', 'password');
    // PDOは、PHP Data Objectsの略で、PHPでデータベースにアクセスするための拡張機能です。ここでは、MySQLデータベースに接続するためのPDOオブジェクトを作成しています。接続文字列には、ホスト名、データベース名、文字セットが指定されており、ユーザー名とパスワードも提供されています。

    foreach ($pdo->query('select * from product') as $row) {
        echo '<tr>';
        echo '<td>', $row['id'], '</td>';
        echo '<td>', $row['name'], '</td>';
        echo '<td>', $row['price'], '円</td>';
        echo '<td> <a href="delete-output.php?id=', $row['id'], '">削除</a></td>';
        echo '</tr>';
        echo "\n";
    }

    ?>
</table>
<?php require '../footer.php'; ?>