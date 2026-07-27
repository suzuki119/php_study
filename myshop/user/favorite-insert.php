<?php session_start(); ?>

<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>

<?php
if (isset($_SESSION['customer'])) {
    require __DIR__ . '/../db.php';

    $check = $pdo->prepare('select * from favorite where customer_id=? and product_id=?');
    $check->execute([$_SESSION['customer']['id'], $_REQUEST['id']]);

    if ($check->fetch()) {
        echo 'すでにお気に入りに追加されています';
    } else {
        $sql = $pdo->prepare('insert into favorite values(?,?)');
        $sql->execute([$_SESSION['customer']['id'], $_REQUEST['id']]);
        echo 'お気に入りを追加しました';
    }

    echo '<hr>';
    require 'favorite.php';
} else {
    echo 'お気に入りに商品を追加するには、ログインしてください';
}


?>



<?php require '../footer.php'; ?>