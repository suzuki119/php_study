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

echo '現在の税率は', $row['tax'], '%です。<br>';
echo '現在の割引セールは', $row['sell_ratio'], '%です。<br>';
echo '現在のポイント比率は', $row['point_ratio'], '%です。<br>';
echo '最終更新日時は', $row['updated_at'], 'です。<br>';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tax = $_POST["tax"];
    $sell_ratio = $_POST["sell_ratio"];
    $point_ratio = $_POST["point_ratio"];
    $date = date('Y-m-d H:i:s');

    $sql_update = $pdo->prepare(
        'update tax_ratio set tax=?, sell_ratio=?, point_ratio=?, updated_at=?'
    );
    $sql_update->execute([
        htmlspecialchars($tax),
        htmlspecialchars($sell_ratio),
        htmlspecialchars($point_ratio),
        $date,
    ]);

    echo '更新しました。';
};

?>

<form method="post">

    税率<input type="text" name="tax" value="<?= htmlspecialchars($row['tax']) ?>"><br>

    割引セール<input type="text" name="sell_ratio" value="<?= htmlspecialchars($row['sell_ratio']) ?>"><br>

    ポイント比率<input type="text" name="point_ratio" value="<?= htmlspecialchars($row['point_ratio']) ?>"><br>
    <input type="submit" value="確定">

</form>

<?php require '../footer.php'; ?>