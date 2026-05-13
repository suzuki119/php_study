<?php require '../header.php'; ?>

<?php

$pdo = new PDO('mysql:host=localhost;dbname=shop;charset=utf8', 'staff', 'password');
// PDOは、PHP Data Objectsの略で、PHPでデータベースにアクセスするための拡張機能です。ここでは、MySQLデータベースに接続するためのPDOオブジェクトを作成しています。接続文字列には、ホスト名、データベース名、文字セットが指定されており、ユーザー名とパスワードも提供されています。

foreach ($pdo->query('select * from product') as $row) {
    echo '<p>';
    echo $row['id'], ':';
    echo $row['name'], ':';
    echo $row['price'], '円';
    echo '</p>';
}

?>

<?php require '../footer.php'; ?>