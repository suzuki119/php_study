<?php session_start(); ?>
<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<?php
// ログインしていれば、そのユーザーの情報をフォームに表示する
if (isset($_SESSION['customer'])) {
    $name = $_SESSION['customer']['name'];
    $address = $_SESSION['customer']['address'];
    $login = $_SESSION['customer']['login'];
    $password = $_SESSION['customer']['password'];
} else {
    $name = '';
    $address = '';
    $login = '';
    $password = '';
}
// フォーム
// 項目 name address login password
// customer-output.phpへ移動
?>
<form action="customer-output.php" method="post">
    <input type="text" name="name" placeholder="名前" value="<?php echo $name; ?>">
    <input type="text" name="address" placeholder="住所" value="<?php echo $address; ?>">
    <input type="text" name="login" placeholder="ログイン名" value="<?php echo $login; ?>">
    <input type="password" name="password" placeholder="パスワード" value="<?php echo $password; ?>">
    <input type="submit" value="保存">
    <?php require '../footer.php'; ?>