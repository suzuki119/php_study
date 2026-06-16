<?php require '../header.php'; ?>
<p>商品を追加します。</p>
<!--
フォーム
項目 name price
insert-output.phpへ移動
-->
<form action="insert-output.php" method="post">
    <input type="text" name="name" placeholder="商品名">
    <input type="text" name="price" placeholder="価格">
    <input type="submit" value="追加">
</form>

<?php require '../footer.php'; ?>