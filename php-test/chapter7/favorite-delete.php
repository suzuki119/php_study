<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<?php
unset($_SESSION['customer']['product'][$_REQUEST['id']]);
echo 'お気に入りから商品を削除しました。';
echo '<hr>';
require 'favorite.php';
?>
<?php require '../footer.php'; ?>