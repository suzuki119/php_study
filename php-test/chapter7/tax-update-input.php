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

?>

<form action="tax-update-output.php" method="post">
    <form action="tax-update-output.php" method="post">

        税率<input type="text" name="tax" value=<?= $row['tax'] ?>><br>

        割引セール<input type="text" name="sell_ratio" value="<?= $row['sell_ratio'] ?>"><br>

        ポイント比率<input type="text" name="point_ratio" value="<?= $row['point_ratio'] ?>"><br>
        <input type="submit" value="確定">

    </form>

    <?php require '../footer.php'; ?>