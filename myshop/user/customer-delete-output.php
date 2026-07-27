<?php session_start(); ?>

<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>

<?php

if (!isset($_SESSION['customer'])) {
    echo 'ログインしていません。';
} elseif ($_REQUEST['password'] !== $_SESSION['customer']['password']) {
    echo 'パスワードが正しくありません。';
} else {
    require __DIR__ . '/../db.php';
    // エラー時に例外を投げるようにする（catchで拾えるようにするため）
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $id = $_SESSION['customer']['id'];

    try {
        // customerは購入・お気に入りから参照されているため、子テーブルから順に削除する
        $pdo->beginTransaction();

        // 購入明細（このお客さんの購入に紐づくもの）
        $sql = $pdo->prepare(
            'delete from purchase_detail ' .
                'where purchase_id in (select id from purchase where customer_id=?)'
        );
        $sql->execute([$id]);

        // 購入
        $sql = $pdo->prepare('delete from purchase where customer_id=?');
        $sql->execute([$id]);

        // お気に入り
        $sql = $pdo->prepare('delete from favorite where customer_id=?');
        $sql->execute([$id]);

        // 会員本体
        $sql = $pdo->prepare('delete from customer where id=?');
        $sql->execute([$id]);

        $pdo->commit(); // 全部成功したら確定

        unset($_SESSION['customer']);
        echo '会員登録を解除しました。ご利用ありがとうございました。';
    } catch (Exception $e) {
        $pdo->rollBack(); // どれか失敗したら全部元に戻す
        echo '退会処理に失敗しました。時間をおいて再度お試しください。';
    }
}

?>

<?php require '../footer.php'; ?>
