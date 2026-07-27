<?php require '../header.php'; ?>

<?php
require __DIR__ . '/../db.php';
if ($sql = $pdo->prepare('insert into product values(null, ?, ?)')) {
    $sql->execute([$_REQUEST['name'], $_REQUEST['price']]);
    echo 'データを挿入しました。';
} else {
    echo 'データの挿入に失敗しました。';
}

?>
<?php require '../footer.php'; ?>