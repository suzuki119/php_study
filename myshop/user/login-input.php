<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<form action="login-output.php" method="post">
    <table>
        <tr>
            <td><label for="login">ログイン名</label></td>
            <td><input type="text" id="login" name="login" autocomplete="username"></td>
        </tr>
        <tr>
            <td><label for="password">パスワード</label></td>
            <td><input type="password" id="password" name="password" autocomplete="current-password"></td>
        </tr>
    </table>
    <input type="submit" value="ログイン">
</form>

<hr>

<form action="login-output.php" method="post">
    <input type="hidden" name="guest" value="1">
    <input type="submit" value="ゲストとしてログイン">
</form>
<p>会員登録なしで、購入・お気に入り・レビューなどの機能をお試しいただけます。<br>
    ゲストのデータはログインのたびに初期化されます。</p>


<?php require '../footer.php'; ?>