<?php
// お気に入り一覧

	$pdo=new PDO('mysql:host=localhost;dbname=shop;charset=utf8', 
		'staff', 'password');

// ログインしているか判定する
// →ログインしていれば、
//   現在ログインしているユーザーのお気に入り一覧を表示する
//   商品詳細へのリンク detail.php
//   お気に入りから削除リンク favorite-delete.php

?>
