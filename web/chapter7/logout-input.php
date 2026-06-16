    <?php session_start(); // セッションを使う宣言
    ?>
    <?php require '../header.php'; ?>
    <?php require 'menu.php'; ?>

    <!--
リンク
logout-output.phpへ移動
-->

    <!--
余力のある人は、現在ログインしているか判定する
→ログインしていなければリンクを表示しない
-->
    <?php
    if (isset($_SESSION['customer'])) {
        echo '<p>ログアウトしますか？</p>';
        echo '<a href="logout-output.php">ログアウトする</a>';
    } else {
        echo 'ログインしていません。';
    }
    ?>
    <?php require '../footer.php'; ?>