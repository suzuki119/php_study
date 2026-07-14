<?php



if (!empty($_SESSION['product'])) {
	echo '<table>';
	echo '<tr><th>商品番号</th><th>商品名</th>';
	echo '<th>価格(税込)</th><th>個数</th><th>小計</th><th></th></tr>';
	$total = 0;

	foreach ($_SESSION['product'] as $id => $product) {
		echo '<tr>';
		echo '<td>', $id, '</td>';
		echo '<td><a href="detail.php?id=', $id, '">',
		$product['name'], '</a></td>';
		echo '<td>', number_format($product['price']), '</td>';
		echo '<td>', $product['count'], '</td>';
		$subtotal = $product['price'] * $product['count'];
		$total += $subtotal;
		echo '<td>', number_format($subtotal), '</td>';
		echo '<td><a href="cart-delete.php?id=', $id, '">削除</a></td>';
		echo '</tr>';
	}

	echo '<tr><td>合計</td><td></td><td></td><td></td><td>', number_format($total),
	'</td><td></td></tr>';
	echo '</table>';
} else {
	echo 'カートに商品がありません。';
}
