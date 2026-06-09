<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<?php
$pdo=new PDO('mysql:host=localhost;dbname=shop;charset=utf8', 
	'staff', 'password');
// idで指定された商品を取得

// フォーム
// 商品画像 image/●.jpg ●は id
// 商品番号、商品名、価格。画面表示は単純テキスト、hiddenで渡す
// 個数 1-10
// 追加ボタン
// cart-insert.phpへ移動

// お気に入り追加リンク favorite-insert.php

// 余力のある人は、idが空だった場合の処理
//                 idがデータベースに存在しない場合
//                 お気に入りに既に登録されているか
?>
<?php require '../footer.php'; ?>
