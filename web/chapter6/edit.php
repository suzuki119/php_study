<?php require '../header.php'; ?>
<div class="th0">商品番号</div>
<div class="th1">商品名</div>
<div class="th1">価格</div><br>
<!--
フォーム
項目 name price 追加
hidden で、command 値は insert
edit3.phpへ移動
-->
<form action="edit3.php" method="post">
<input type="hidden" name="command" value="insert">
<div class="td0"></div>
<div class="td1"><input type="text" name="name"></div>
<div class="td1"><input type="text" name="price"></div>
<div class="td2"><input type="submit" value="追加"></div>
</form><br>
<?php require '../footer.php'; ?>
