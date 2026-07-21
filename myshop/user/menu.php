<?php
$current_page = basename($_SERVER['SCRIPT_NAME']);
$menu_items = [
	'product.php'               => '商品',
	'favorite-show.php'         => 'お気に入り',
	'history.php'               => '購入履歴',
	'cart-show.php'             => 'カート',
	'purchase-input.php'        => '購入',
	'login-input.php'           => 'ログイン',
	'logout-input.php'          => 'ログアウト',
	'customer-input.php'        => '会員登録',
	'customer-delete-input.php' => '退会',
	'tax-update-input.php'      => '税率編集',
	'../owner/edit3.php'        => '商品編集',
];
?>
<div class="site-header">
	<a class="brand" href="product.php">NUTS SHOP</a>
	<nav class="menu">
		<?php foreach ($menu_items as $href => $label): ?>
			<a href="<?= $href ?>" class="<?= basename($href) === $current_page ? 'is-active' : '' ?>"><?= $label ?></a>
		<?php endforeach; ?>
	</nav>
</div>
