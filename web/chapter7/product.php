<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<!--
フォーム
項目 keyword
product.php(同じページ)へ移動
-->
<hr>
<?php
$pdo=new PDO('mysql:host=localhost;dbname=shop;charset=utf8', 
	'staff', 'password');
// keyword が設定されていれば、部分一致で検索
// keyword が設定されていなければ、商品すべて

// 商品一覧を表示 
// 詳細 detail.php へのリンク

// 余力のある人は、検索語の表示。検索して0件だったときの表示
?>
<?php require '../footer.php'; ?>
