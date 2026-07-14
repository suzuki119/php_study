<?php session_start(); ?>

<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>

<?php

$name = $address = $login = $password = '';

if (isset($_SESSION['customer'])) {
    $name = $_SESSION['customer']['name'];
    $address = $_SESSION['customer']['address'];
    $login = $_SESSION['customer']['login'];
    $password = $_SESSION['customer']['password'];
}

echo '<form action="customer-output.php" method="post">';
echo '<table>';
echo '<tr><td>お名前</td><td><input type="text" name="name" value="', $name, '"></td></tr>';
echo '<tr><td>住所</td><td><input type="text" name="address" value="', $address, '"></td></tr>';
echo '<tr><td>ログイン名</td><td><input type="text" name="login" value="', $login, '"></td></tr>';
echo '<tr><td>パスワード</td><td><input type="password" name="password" value="', $password, '"></td></tr>';
echo '</table>';
echo '<input type="submit" value="登録">';
echo '</form>';

?>

<?php require '../footer.php'; ?>