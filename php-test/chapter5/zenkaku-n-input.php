<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
};

?>

<?php require '../header.php'; ?>
<form action="zenkaku-n-output.php" method="post">
    <input type="text" name="zenkaku" placeholder="数字を入力">
    <input type="submit" value="送信">
</form>

<?php require '../footer.php'; ?>