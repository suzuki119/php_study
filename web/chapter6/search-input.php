<?php require '../header.php'; ?>
商品名を入力してください。
<!--
フォーム
項目 keyword
search-output.phpへ移動
-->
<form action="search-output.php" method="post">
    <input type="text" name="keyword">
    <input type="submit" value="検索">
</form>
<?php require '../footer.php'; ?>