<?php session_start(); ?>

<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>

<?php

if (isset($_SESSION['customer'])) {
    echo $_SESSION['customer']['name'], 'さんの会員登録を解除します。<br>';
    echo '<p>この操作は取り消せません。よろしいですか？</p>';

    echo '<form action="customer-delete-output.php" method="post">';
    echo '<p>確認のためパスワードを入力してください。<br>';
    echo '<input type="password" name="password"></p>';
    echo '<input type="submit" value="退会する">';
    echo '</form>';
} else {
    echo 'ログインしていません。退会するにはログインしてください。';
}

?>

<?php require '../footer.php'; ?>
