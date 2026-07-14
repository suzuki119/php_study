<?php session_start(); ?>
<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<?php


$pdo = new PDO(
    'mysql:host=localhost;dbname=shop;charset=utf8',
    'staff',
    'password'
);
$sql = $pdo->prepare('delete from review where id=? and customer_id=?');
$sql->execute([$_REQUEST['id'], $_SESSION['customer']['id']]);

echo '<p>レビューを削除しました。</p>';

?>
<?php require '../footer.php'; ?>