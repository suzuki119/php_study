<?php require '../header.php'; ?>
<?php
require __DIR__ . '/../db.php';

$sql = $pdo->prepare('update product set name=?, price=? where id=?');

if (empty($_REQUEST['name'])) {
    echo '検索キーワードが入力されていません。';
} else
    if (!preg_match('/^[0-9]+$/', $_REQUEST['price'])) {
    echo '価格は整数で入力してください。';
} else
        if ($sql->execute(
    [htmlspecialchars($_REQUEST['name']), $_REQUEST['price'], $_REQUEST['id']]
)) {
    echo 'データを更新しました。';
} else {
    echo 'データの更新に失敗しました。';
}

?>

<?php require '../footer.php'; ?>