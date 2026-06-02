create table tax_ratio (
	tax int  not null,
	sell_ratio int,
    point_ratio int
);

INSERT INTO tax_ratio VALUES(10,null,null);


-- tax_ratioテーブルは、税率、販売比率、ポイント比率を格納するためのテーブルです。tax列は整数型で、nullを許可しません。sell_ratio列とpoint_ratio列は整数型で、nullを許可します。INSERT INTO文は、tax_ratioテーブルに新しい行を挿入しています。ここでは、税率が10で、販売比率とポイント比率はnullとなっています。

ALTER TABLE tax_ratio ADD id int AUTO_INCREMENT PRIMARY KEY;
-- ALTER TABLE文は、既存のテーブルに対して変更を加えるためのコマンドです。ここでは、tax_ratioテーブルにid列を追加しています。id列は整数型で、自動的に増加する主キーとなります。これにより、tax_ratioテーブルの各行に一意の識別子が割り当てられます。

ALTER TABLE tax_ratio ADD updated_at DATETIME;
-- updated_at列を追加します。DATETIME型で、税率がいつ設定（更新）されたかの日時を「YYYY-MM-DD HH:MM:SS」の形式で保存します。これにより、いつの時点の税率なのかを記録できます。