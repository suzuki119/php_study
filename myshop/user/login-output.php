<?php session_start(); ?>

<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>

<?php

unset($_SESSION['customer']);
require __DIR__ . '/../db.php';
require_once __DIR__ . '/../guest.php';

$is_guest = !empty($_REQUEST['guest']);

if ($is_guest) {
    // ゲストのパスワードを画面に出さないよう、認証情報はサーバ側で決める
    $row = find_or_create_guest($pdo);
} else {
    $sql = $pdo->prepare('select * from customer where login=? and password=?');
    $sql->execute([$_REQUEST['login'] ?? '', $_REQUEST['password'] ?? '']);
    $row = $sql->fetch(PDO::FETCH_ASSOC);
}

if ($row) {
    $_SESSION['customer'] = [
        'id' => $row['id'],
        'name' => $row['name'],
        'address' => $row['address'],
        'login' => $row['login'],
        'password' => $row['password'],
        'point' => $row['point'],
        'owner' => (bool)$row['owner'],
        'guest' => $row['login'] === GUEST_LOGIN
    ];
}

if (isset($_SESSION['customer'])) {
    if ($_SESSION['customer']['guest']) {
        // 前の訪問者のデータを引き継がないよう、毎回まっさらな状態から始める
        reset_guest_data($pdo, $_SESSION['customer']['id']);
        $_SESSION['customer']['point'] = 0;
        unset($_SESSION['product']); // カートも空にする
        echo 'ゲストとしてログインしました。会員登録なしで購入・お気に入り・レビューをお試しいただけます。';
    } else {
        echo 'いらっしゃいませ', $_SESSION['customer']['name'], 'さん';
    }
} elseif ($is_guest) {
    echo 'ゲストログインに失敗しました。';
} else {
    echo 'ログインに失敗しました';
}

?>

<?php require '../footer.php'; ?>
