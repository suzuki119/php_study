<?php require '../header.php'; ?>
<?php
require __DIR__ . '/../db.php';
$sql = $pdo->prepare('select * from product where name=?');
$keyword = $_REQUEST['keyword'];
$sql->execute([$keyword]);

foreach ($sql as $row) {
    echo '<p>';
    echo $row['id'], ':';
    echo $row['name'], ':';
    echo $row['price'], '円';
    echo '</p>';
}

?>

<?php require '../footer.php'; ?>