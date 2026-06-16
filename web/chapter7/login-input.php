<?php session_start(); // セッションを使う宣言
?>
<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<!--
フォーム
項目 login password
login-output.phpへ移動
-->


<!--
余力のある人は、現在ログインしているか判定する
→ログイン済みならフォームを表示しない
-->

<?php

if (isset($_SESSION['customer'])) {
    echo 'ログイン済みです。';
} else {
    echo '<form action="login-output.php" method="post">';
    echo '<input type="text" name="login" placeholder="ログイン名">';
    echo '<input type="password" name="password" placeholder="パスワード">';
    echo '<input type="submit" value="ログイン">';
    echo '</form>';
}

?>
<?php require '../footer.php'; ?>