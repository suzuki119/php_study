<?php require '../header.php'; ?>
<table>
<tr><th>商品番号</th><th>商品名</th><th>価格</th></tr>
<?php
$pdo=new PDO('mysql:host=localhost;dbname=shop;charset=utf8', 
	'staff', 'password');
// product テーブルからデータを取得
// foreach で順に表示する
// htmlspecialcharsでHTMLタグを変換してから表示する
// 余力のある人は、データ0件の場合
?>
</table>
<?php require '../footer.php'; ?>
