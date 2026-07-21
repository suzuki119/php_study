<?php session_start(); ?>

<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>

<?php

$pdo = new PDO('mysql:host=localhost;dbname=shop;charset=utf8', 'staff', 'password');

if (isset($_SESSION['customer'])) { // ログインしている場合は、ログイン名が変更されていないか確認するために、データベースから現在のログイン名を取得

    $id = $_SESSION['customer']['id'];
    $sql = $pdo->prepare('select * from customer where id=?');
    $sql->execute([$id], $_REQUEST['login']);
} else {
    $sql = $pdo->prepare('select * from customer where login=?');
    $sql->execute([$_REQUEST['login']]);
}

if (empty($sql->fetchAll())) { // ログイン名が重複していない場合は、データベースに登録または更新

    if (isset($_SESSION['customer'])) { // ログインしている場合は、データベースを更新
        $sql = $pdo->prepare('update customer set name=?, address=?, login=?, password=? where id=?');

        $sql->execute([
            $_REQUEST['name'],
            $_REQUEST['address'],
            $_REQUEST['login'],
            $_REQUEST['password'],
            $id
        ]);
        $_SESSION['customer'] = array_merge($_SESSION['customer'], [
            'id' => $id,
            'name' => $_REQUEST['name'],
            'address' => $_REQUEST['address'],
            'login' => $_REQUEST['login'],
            'password' => $_REQUEST['password']
        ]);
        echo 'データを更新しました。';
    } else { // ログインしていない場合は、データベースに登録
        $sql = $pdo->prepare('insert into customer values(null, ?, ?, ?, ?)');
        $sql->execute([
            $_REQUEST['name'],
            $_REQUEST['address'],
            $_REQUEST['login'],
            $_REQUEST['password']
        ]);
        echo 'データを登録しました。';
    }
} else {
    echo 'このログイン名は既に使用されています。別のログイン名を入力してください。';
}
?>

<?php require '../footer.php'; ?>