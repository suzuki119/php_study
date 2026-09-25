<?php

// 会員登録なしでサイトの機能を試してもらうためのゲストログイン用の設定。
// ゲストは customer テーブルに実在する1件のアカウントで、
// お気に入り・購入・レビューが外部キーで customer_id を必要とするため、
// セッションだけのゲストではなく実レコードとして用意している。
const GUEST_LOGIN = 'guest';
const GUEST_PASSWORD = 'guest';
const GUEST_NAME = 'ゲスト';
const GUEST_ADDRESS = '東京都千代田区丸の内1-1-1';

// ゲスト会員を取得する。まだ無い環境では自動で作成するので、
// 移行用SQLを流し忘れてもゲストログインが動く。
function find_or_create_guest(PDO $pdo)
{
    $sql = $pdo->prepare('select * from customer where login=?');
    $sql->execute([GUEST_LOGIN]);
    $row = $sql->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        return $row;
    }

    $sql = $pdo->prepare(
        'insert into customer (name, address, login, password, point, owner) ' .
            'values (?, ?, ?, ?, 0, null)'
    );
    $sql->execute([GUEST_NAME, GUEST_ADDRESS, GUEST_LOGIN, GUEST_PASSWORD]);

    $sql = $pdo->prepare('select * from customer where login=?');
    $sql->execute([GUEST_LOGIN]);

    return $sql->fetch(PDO::FETCH_ASSOC);
}

// ゲストは訪問者全員で共有するアカウントなので、ログインのたびに
// 前の訪問者が残したデータを消して初期状態に戻す。
function reset_guest_data(PDO $pdo, $id)
{
    $pdo->beginTransaction();
    try {
        // 購入明細（このゲストの購入に紐づくもの）
        $sql = $pdo->prepare(
            'delete from purchase_detail ' .
                'where purchase_id in (select id from purchase where customer_id=?)'
        );
        $sql->execute([$id]);

        foreach (['purchase', 'favorite', 'review'] as $table) {
            $sql = $pdo->prepare("delete from $table where customer_id=?");
            $sql->execute([$id]);
        }

        // 獲得ポイントも初期化する
        $sql = $pdo->prepare('update customer set point=0 where id=?');
        $sql->execute([$id]);

        $pdo->commit();
    } catch (PDOException $e) {
        $pdo->rollBack();
        return false;
    }
    return true;
}
