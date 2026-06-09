<?php require '../header.php'; ?>
<p>お名前のフリガナを入力してください。</p>
<!--
フォーム
項目 furigana
zenhan-kana-output.phpへ移動
-->
<form action="zenhan-kana-output.php" method="post">
    <input type="text" name="kana">
    <input type="submit" value="確定">
</form>
<?php require '../footer.php'; ?>