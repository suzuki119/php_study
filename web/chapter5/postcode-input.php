<?php require '../header.php'; ?>
<p>7桁の郵便番号をハイフンなしで入力してください。</p>
<!--
フォーム
項目 postcode
postcode-output.phpへ移動
-->
<form action="postcode-output.php" method="post">
    <input type="text" name="index">
    <input type="submit" value="確定">
</form>
<?php require '../footer.php'; ?>