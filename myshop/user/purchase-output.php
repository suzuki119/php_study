<?php session_start(); ?>
<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<?php

require __DIR__ . '/../db.php';

$purchase_id = 1; //購入IDは、purchaseテーブルの最大値に1を加えたものとする



foreach ($pdo->query('select max(id) from purchase') as $row) {
	$purchase_id = $row['max(id)'] + 1; // purchaseテーブルの最大値を取得し、それに1を加えることで、新しい購入IDを生成しています。これにより、購入IDが重複することなく、連続した番号が割り当てられます。
}

$sql = $pdo->prepare('insert into purchase values(?,?)');

if ($sql->execute([$purchase_id, $_SESSION['customer']['id']])) {
	$total = 0;
	foreach ($_SESSION['product'] as $product_id => $product) {
		$sql = $pdo->prepare('insert into purchase_detail values(?,?,?)');
		$sql->execute([$purchase_id, $product_id, $product['count']]);
		$total += $product['price'] * $product['count']; // 税込価格×個数を集計
	}

	// 購入額に応じてポイントを加算する
	$tax_row = $pdo->query('select * from tax_ratio')->fetch();
	$point = round($total * $tax_row['point_ratio'] / 100);

	$customer_point_update = $pdo->prepare('update customer set point=point+? where id=?');
	$customer_point_update->execute([$point, $_SESSION['customer']['id']]);

	$_SESSION['customer']['point'] += $point; // セッション上の残高も更新

	unset($_SESSION['product']); // カートを空にする
	echo '購入手続きが完了しました。', $point, 'ポイント獲得しました。ありがとうございます。';
} else {
	echo '購入手続き中にエラーが発生しました。申し訳ございません。';
}
?>
<?php require '../footer.php'; ?>
