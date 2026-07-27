-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:8889
-- 生成日時: 2026 年 7 月 27 日 09:12
-- サーバのバージョン： 8.0.40
-- PHP のバージョン: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `shop`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `customer`
--

CREATE TABLE `customer` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `point` int DEFAULT '0',
  `owner` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- テーブルのデータのダンプ `customer`
--

INSERT INTO `customer` (`id`, `name`, `address`, `login`, `password`, `point`, `owner`) VALUES
(1, '熊木 和夫', '東京都新宿区西新宿2-8-1', 'kumaki', 'BearTree1', 10, NULL),
(3, '鷺沼 美子', '大阪府大阪市中央区大手前2', 'saginuma', 'EgretPond3', 0, NULL),
(4, '鷲尾 史郎', '愛知県名古屋市中区三の丸3-1-2', 'washio', 'EagleTail4', 0, NULL),
(5, '牛島 大悟', '埼玉県さいたま市浦和区高砂3-15-1', 'ushijima', 'CowIsland5', 0, NULL),
(6, '相馬 助六', '千葉県地足中央区市場町1-1', 'souma', 'PhaseHorse6', 0, NULL),
(7, '猿飛 菜々子', '兵庫県神戸市中央区下山手通5-10-1', 'sarutobi', 'MonkeyFly7', 0, NULL),
(8, '犬山 陣八', '北海道札幌市中央区北3西6', 'inuyama', 'DogMountain8', 0, NULL),
(9, '猪口 一休', '福岡県福岡市博多区東公園7-7', 'inokuchi', 'BoarMouse9', 0, NULL),
(10, '鈴木 優太郎', '名古屋市守山区西城2丁目12-24番地', 'suzuki', 'Taraba', 826, 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `favorite`
--

CREATE TABLE `favorite` (
  `customer_id` int NOT NULL,
  `product_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- テーブルのデータのダンプ `favorite`
--

INSERT INTO `favorite` (`customer_id`, `product_id`) VALUES
(10, 1),
(10, 3),
(10, 5),
(10, 7),
(10, 8),
(10, 10);

-- --------------------------------------------------------

--
-- テーブルの構造 `product`
--

CREATE TABLE `product` (
  `id` int NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- テーブルのデータのダンプ `product`
--

INSERT INTO `product` (`id`, `name`, `price`) VALUES
(1, '松の実', 600),
(2, 'くるみ', 270),
(3, 'ひまわりの種', 210),
(4, 'アーモンド', 220),
(5, 'カシューナッツ', 250),
(6, 'ジャイアントコーン', 180),
(7, 'ピスタチオ', 310),
(8, 'マカダミアナッツ', 600),
(9, 'かぼちゃの種', 180),
(10, 'ピーナッツ', 150),
(20, ' 枝豆', 1000);

-- --------------------------------------------------------

--
-- テーブルの構造 `purchase`
--

CREATE TABLE `purchase` (
  `id` int NOT NULL,
  `customer_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- テーブルのデータのダンプ `purchase`
--

INSERT INTO `purchase` (`id`, `customer_id`) VALUES
(1, 10),
(2, 10),
(3, 10),
(4, 10),
(5, 10),
(6, 10),
(7, 10),
(8, 10),
(9, 10),
(10, 10),
(11, 10),
(12, 10),
(13, 10),
(14, 10),
(15, 10),
(16, 10),
(17, 10),
(18, 10);

-- --------------------------------------------------------

--
-- テーブルの構造 `purchase_detail`
--

CREATE TABLE `purchase_detail` (
  `purchase_id` int NOT NULL,
  `product_id` int NOT NULL,
  `count` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- テーブルのデータのダンプ `purchase_detail`
--

INSERT INTO `purchase_detail` (`purchase_id`, `product_id`, `count`) VALUES
(1, 3, 2),
(1, 6, 1),
(2, 3, 4),
(2, 10, 7),
(3, 1, 5),
(4, 1, 1),
(4, 9, 3),
(5, 7, 1),
(6, 3, 1),
(9, 1, 1),
(10, 1, 1),
(10, 4, 1),
(10, 5, 1),
(11, 2, 1),
(12, 1, 1),
(13, 1, 1),
(14, 1, 10),
(15, 1, 5),
(16, 1, 4),
(16, 9, 5),
(17, 1, 1),
(18, 1, 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `review`
--

CREATE TABLE `review` (
  `id` int NOT NULL,
  `customer_id` int NOT NULL,
  `product_id` int NOT NULL,
  `rating` tinyint NOT NULL,
  `review_text` text NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- テーブルのデータのダンプ `review`
--

INSERT INTO `review` (`id`, `customer_id`, `product_id`, `rating`, `review_text`, `created_at`) VALUES
(2, 10, 6, 1, '色がヤバいと思うんすけど、いいんすかこれ', '2026-07-07 14:33:43'),
(3, 10, 2, 2, '硬すぎを超えた硬すぎ', '2026-07-07 14:34:19'),
(4, 10, 7, 5, '塩っ気が合って美味い、BENE', '2026-07-07 15:26:37'),
(5, 10, 7, 1, 'そこまで', '2026-07-07 15:26:49'),
(6, 10, 7, 1, 'いうほど', '2026-07-07 15:27:03'),
(10, 10, 1, 1, 'おいしくない', '2026-07-07 16:45:42'),
(12, 1, 1, 5, '美味しい', '2026-07-07 16:46:50'),
(13, 10, 4, 1, '二度と食べない', '2026-07-07 16:48:47'),
(14, 10, 8, 5, 'test', '2026-07-14 15:29:00');

-- --------------------------------------------------------

--
-- テーブルの構造 `setmenu`
--

CREATE TABLE `setmenu` (
  `id` int NOT NULL,
  `set_id` int NOT NULL,
  `product_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- テーブルのデータのダンプ `setmenu`
--

INSERT INTO `setmenu` (`id`, `set_id`, `product_id`) VALUES
(81, 5, 1),
(82, 5, 2),
(83, 5, 3),
(84, 5, 4),
(85, 5, 5),
(86, 5, 6),
(87, 5, 7),
(88, 5, 8),
(89, 5, 9),
(90, 5, 10),
(91, 5, 20),
(96, 6, 2),
(97, 6, 4),
(98, 6, 6),
(99, 6, 8),
(100, 6, 10),
(101, 7, 7),
(102, 7, 10),
(103, 7, 20);

-- --------------------------------------------------------

--
-- テーブルの構造 `sets`
--

CREATE TABLE `sets` (
  `id` int NOT NULL,
  `menu_text` text NOT NULL,
  `price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- テーブルのデータのダンプ `sets`
--

INSERT INTO `sets` (`id`, `menu_text`, `price`) VALUES
(5, '全部のせ', 4000),
(6, '甘いセット', 600),
(7, 'つまみセット', 600);

-- --------------------------------------------------------

--
-- テーブルの構造 `tax_ratio`
--

CREATE TABLE `tax_ratio` (
  `tax` int NOT NULL,
  `sell_ratio` int DEFAULT NULL,
  `point_ratio` int DEFAULT NULL,
  `id` int NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- テーブルのデータのダンプ `tax_ratio`
--

INSERT INTO `tax_ratio` (`tax`, `sell_ratio`, `point_ratio`, `id`, `updated_at`) VALUES
(99, 0, 99, 1, '2026-07-21 07:57:51');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- テーブルのインデックス `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`customer_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- テーブルのインデックス `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- テーブルのインデックス `purchase_detail`
--
ALTER TABLE `purchase_detail`
  ADD PRIMARY KEY (`purchase_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- テーブルのインデックス `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `setmenu`
--
ALTER TABLE `setmenu`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `sets`
--
ALTER TABLE `sets`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `tax_ratio`
--
ALTER TABLE `tax_ratio`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- テーブルの AUTO_INCREMENT `product`
--
ALTER TABLE `product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- テーブルの AUTO_INCREMENT `review`
--
ALTER TABLE `review`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- テーブルの AUTO_INCREMENT `setmenu`
--
ALTER TABLE `setmenu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- テーブルの AUTO_INCREMENT `sets`
--
ALTER TABLE `sets`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- テーブルの AUTO_INCREMENT `tax_ratio`
--
ALTER TABLE `tax_ratio`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- ダンプしたテーブルの制約
--

--
-- テーブルの制約 `favorite`
--
ALTER TABLE `favorite`
  ADD CONSTRAINT `favorite_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `favorite_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- テーブルの制約 `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `purchase_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);

--
-- テーブルの制約 `purchase_detail`
--
ALTER TABLE `purchase_detail`
  ADD CONSTRAINT `purchase_detail_ibfk_1` FOREIGN KEY (`purchase_id`) REFERENCES `purchase` (`id`),
  ADD CONSTRAINT `purchase_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
