<?php session_start(); ?>

<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>

<?php

$pdo = new PDO('mysql:host=localhost;dbname=shop;charset=utf8', 'staff', 'password');

$tax_sql = $pdo->query('select * from tax_ratio');
$tax_row = $tax_sql->fetch();

$id = $_REQUEST['id'];
if (!isset($_SESSION['product'])) {
    $_SESSION['product'] = [];
}
$count = 0;
if (isset($_SESSION['product'][$id])) {
    $count = $_SESSION['product'][$id]['count'];
}
$_SESSION['product'][$id] = [
    'name' => $_REQUEST['name'],
    'price' => round($_REQUEST['price']),
    'count' => $count + $_REQUEST['count']
];

echo '<p>カートに商品を追加しました</p>';
echo '<hr>';
require 'cart.php';

?>


<?php require '../footer.php'; ?>