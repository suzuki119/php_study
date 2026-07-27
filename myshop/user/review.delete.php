<?php session_start(); ?>
<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<?php


require __DIR__ . '/../db.php';
$sql = $pdo->prepare('delete from review where id=? and customer_id=?');
$sql->execute([$_REQUEST['id'], $_SESSION['customer']['id']]);

echo '<p>レビューを削除しました。</p>';

?>
<?php require '../footer.php'; ?>