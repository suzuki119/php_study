<?php require '../header.php'; ?>
<?php
require __DIR__ . '/../db.php';
$sql = $pdo->prepare('delete from product where id=?');

if ($sql->execute([$_REQUEST['id']])) {
    echo 'データを削除しました。';
} else {
    echo 'データの削除に失敗しました。';
}

?>

<?php require '../footer.php'; ?>