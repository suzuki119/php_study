<?php require '../header.php'; ?>

<p>メッセージを入力してください：</p>
<form action="board-output.php" method="post">
    <input type="text" name="message">
    <input type="submit" value="送信">
</form>


<?php require '../footer.php'; ?>