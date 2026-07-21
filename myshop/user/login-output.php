<?php session_start(); ?>

<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>

<?php

unset($_SESSION['customer']);
$pdo = new PDO('mysql:host=localhost;dbname=shop;charset=utf8', 'staff', 'password');
$sql = $pdo->prepare('select * from customer where login=? and password=?');

$sql->execute([$_REQUEST['login'], $_REQUEST['password']]);

foreach ($sql as $row) {
    $_SESSION['customer'] = [
        'id' => $row['id'],
        'name' => $row['name'],
        'address' => $row['address'],
        'login' => $row['login'],
        'password' => $row['password'],
        'point' => $row['point'],
        'owner' => (bool)$row['owner']
    ];
}

if (isset($_SESSION['customer'])) {
    echo 'いらっしゃいませ', $_SESSION['customer']['name'], 'さん';
} else {
    echo 'ログインに失敗しました';
}

?>

<?php require '../footer.php'; ?>