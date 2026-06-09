<?php require '../header.php'; ?>
<p>投稿するメッセージを入力してください。</p>
<!--
フォーム
項目 message
board-output.phpへ移動
-->
<form action="board-output.php" method="post">
    <input type="text" name="text">
    <input type="submit" value="確定">
</form>
<?php require '../footer.php'; ?>