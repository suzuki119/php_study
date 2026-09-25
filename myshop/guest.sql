-- ゲストログイン用の会員アカウント
-- 既に稼働中のデータベースに対して1度だけ実行する
INSERT INTO customer (name, address, login, password, point, owner)
VALUES ('ゲスト', '東京都千代田区丸の内1-1-1', 'guest', 'guest', 0, NULL);
