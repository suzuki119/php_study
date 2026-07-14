<?php require '../header.php'; ?>

<?php
$pdo = new PDO('mysql:host=localhost;dbname=shop;charset=utf8', 'staff', 'password');
if ($sql = $pdo->prepare('insert into product values(null, ?, ?)')) {
    $sql->execute([$_REQUEST['name'], $_REQUEST['price']]);
    echo 'データを挿入しました。';
} else {
    echo 'データの挿入に失敗しました。';
}

?>
<?php require '../footer.php'; ?>