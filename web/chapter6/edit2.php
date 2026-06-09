<?php require '../header.php'; ?>
<div class="th0">商品番号</div>
<div class="th1">商品名</div>
<div class="th1">価格</div><br>
<?php
$pdo=new PDO('mysql:host=localhost;dbname=shop;charset=utf8', 
	'staff', 'password');
// データベースから商品一覧を取得する
// 商品ごとに、name price 更新ボタン
// 商品id は hidden で渡す
// hidden で、command 値は update
// edit3.phpへ移動
?>
<!--
フォーム
項目 name price 追加
hidden で、command 値は insert
edit3.phpへ移動
※ edit.php と同じ
-->
<?php require '../footer.php'; ?>
