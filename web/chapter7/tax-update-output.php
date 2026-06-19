<?php session_start(); ?>
<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>

<?php

$pdo = new PDO(
    'mysql:host=localhost;dbname=shop;charset=utf8',
    'staff',
    'password'
);

$sql = $pdo->query('select * from tax_ratio');
$row = $sql->fetch();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tax = $_POST["tax"];
    $sell_ratio = $_POST["sell_ratio"];
    $point_ratio = $_POST["point_ratio"];
    $date = date('Y-m-d H:i:s');

    $sql_update = $pdo->prepare(
        'update tax_ratio set tax=?, sell_ratio=?, point_ratio=?, updated_at=?'
    );
    $sql_update->execute([
        $tax,
        $sell_ratio,
        $point_ratio,
        $date,
    ]);

    echo '更新しました。';
};

?>

    <?php require '../footer.php'; ?>