<?php require '../header.php'; ?>
<div class="th0">商品番号</div>
<div class="th1">商品名</div>
<div class="th1">価格</div>
<?php
$pdo=new PDO('mysql:host=localhost;dbname=shop;charset=utf8', 
	'staff', 'password');
// データベースから商品一覧を取得する
// 商品ごとに、name price 更新ボタン
// 商品id は hidden で渡す
// update-output.phpへ移動
?>
<?php require '../footer.php'; ?>
