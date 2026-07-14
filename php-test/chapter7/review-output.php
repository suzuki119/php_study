<?php session_start(); ?>
<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<?php

$pdo = new PDO(
    'mysql:host=localhost;dbname=shop;charset=utf8',
    'staff',
    'password'
);
$sql = $pdo->prepare('insert into review (customer_id, product_id, rating, review_text) values (?, ?, ?, ?)');
$sql->execute([
    $_SESSION['customer']['id'],
    $_REQUEST['product_id'],
    $_REQUEST['rating'],
    $_REQUEST['review_text']
]);

echo '<p>レビューを投稿しました。</p>';

?>
<?php require '../footer.php'; ?>