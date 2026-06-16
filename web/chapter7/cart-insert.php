<?php session_start(); ?>
<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<?php
// データ id count をリクエストから取得
// セッションに商品の個数を登録。既にある場合は個数を増やす
$id = $_REQUEST['id'];
$count = $_REQUEST['count'];
$price = $_REQUEST['price'];
$name = $_REQUEST['name'];

$pdo = new PDO('mysql:host=localhost;dbname=shop;charset=utf8', 'staff', 'password');

$tax_sql = $pdo->query('select * from tax_ratio');
$tax_row = $tax_sql->fetch();

if (!isset($_SESSION['product'])) {
    $_SESSION['product'] = [];
}

if (isset($_SESSION['product'][$id])) {
    $count += $_SESSION['product'][$id]['count'];
}

$_SESSION['product'][$id] = ['name' => $name, 'price' => $price * $tax_row['tax'] / 100 + $price, 'count' => $count];

echo '<p>カートに商品を追加しました。</p>';

// 余力のある人は、count の値のチェック
//                 id に対応する商品があるかチェック
echo '<hr>';
require 'cart.php'; // カートの商品一覧
?>
<?php require '../footer.php'; ?>
