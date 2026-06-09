<?php require '../header.php'; ?>
<table>
<tr><th>商品番号</th><th>商品名</th><th>価格</th><th></th></tr>
<?php
$pdo=new PDO('mysql:host=localhost;dbname=shop;charset=utf8', 
	'staff', 'password');
// データベースから商品一覧を取得する
// 商品ごとに、削除ボタン
// 商品id は hidden で渡す
// delete-output.phpへ移動
?>
</table>
<?php require '../footer.php'; ?>
