drop database if exists shop;
-- dropは、すでに存在するデータベースを削除するためのコマンドです。もし、shopという名前のデータベースがすでに存在している場合は、それを削除します。

create database shop default character set utf8 collate utf8_general_ci;
-- createは、新しいデータベースを作成するためのコマンドです。ここでは、shopという名前のデータベースを作成しています。default character set utf8 collate utf8_general_ciは、データベースの文字セットと照合順序を指定しています。utf8は、Unicode文字をサポートする文字セットであり、utf8_general_ciは、大文字と小文字を区別しない照合順序です。

drop user if exists 'staff'@'localhost';
-- drop userは、すでに存在するユーザーを削除するためのコマンドです。もし、'staff'@'localhost'というユーザーがすでに存在している場合は、それを削除します。

create user 'staff'@'localhost' identified by 'password';
-- create userは、新しいユーザーを作成するためのコマンドです。ここでは、'staff'@'localhost'というユーザーを作成しています。identified by 'password'は、そのユーザーのパスワードを指定しています。

grant all on shop.* to 'staff'@'localhost';
-- grantは、ユーザーに特定の権限を付与するためのコマンドです。ここでは、'staff'@'localhost'ユーザーに対して、shopデータベース内のすべてのテーブルに対するすべての権限を付与しています。

use shop;
-- useは、特定のデータベースを選択するためのコマンドです。ここでは、shopデータベースを選択しています。

create table product (
	id int auto_increment primary key,
	name varchar(200) not null,
	price int not null
); 
-- create tableは、新しいテーブルを作成するためのコマンドです。ここでは、productという名前のテーブルを作成しています。idは、整数型で自動的に増加する主キーです。nameは、200文字までの文字列型で、nullを許可しません。priceは、整数型で、nullを許可しません。

insert into product values(null, '松の実', 700);
insert into product values(null, 'くるみ', 270);
insert into product values(null, 'ひまわりの種', 210);
insert into product values(null, 'アーモンド', 220);
insert into product values(null, 'カシューナッツ', 250);
insert into product values(null, 'ジャイアントコーン', 180);
insert into product values(null, 'ピスタチオ', 310);
insert into product values(null, 'マカダミアナッツ', 600);
insert into product values(null, 'かぼちゃの種', 180);
insert into product values(null, 'ピーナッツ', 150);
insert into product values(null, 'クコの実', 400);
-- insert intoは、テーブルに新しい行を挿入するためのコマンドです。ここでは、productテーブルに複数の行を挿入しています。id列にはnullを指定しているため、自動的に増加する値が割り当てられます。name列にはナッツや種の名前が、price列にはそれぞれの価格が指定されています。
