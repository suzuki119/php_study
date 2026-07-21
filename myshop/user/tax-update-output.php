<?php session_start(); ?>
<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<?php require '../require-owner.php'; ?>

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

    // 0〜100の範囲かチェック
    if (
        !is_numeric($tax) || $tax < 0 || $tax > 100 ||
        !is_numeric($sell_ratio) || $sell_ratio < 0 || $sell_ratio > 100 ||
        !is_numeric($point_ratio) || $point_ratio < 0 || $point_ratio > 100
    ) {
        echo '各比率は0〜100の数値で入力してください。';
    } else {
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
    }
};

?>

    <?php require '../footer.php'; ?>