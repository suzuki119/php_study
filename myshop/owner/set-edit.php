<?php session_start(); ?>
<?php require '../header.php'; ?>
<?php require '../require-owner.php'; ?>
<?php

$pdo = new PDO('mysql:host=localhost;dbname=shop;charset=utf8', 'staff', 'password');

function save_set_products($set_id)
{
    global $pdo;
    $pdo->prepare('delete from setmenu where set_id=?')->execute([$set_id]);
    if (empty($_REQUEST['product_ids'])) return;
    $sql = $pdo->prepare('insert into setmenu(set_id, product_id) values(?, ?)');
    foreach ($_REQUEST['product_ids'] as $product_id) {
        if (!preg_match('/^[0-9]+$/', $product_id)) continue;
        $sql->execute([$set_id, $product_id]);
    }
}

if (isset($_REQUEST['command'])) {
    switch ($_REQUEST['command']) {
        case 'insert':
            if (
                empty($_REQUEST['menu_text']) ||
                !preg_match('/^[0-9]+$/', $_REQUEST['price'])
            ) break;
            $sql = $pdo->prepare('insert into sets(id, menu_text, price) values(null, ?, ?)');
            $sql->execute([htmlspecialchars($_REQUEST['menu_text']), $_REQUEST['price']]);
            save_set_products($pdo->lastInsertId());
            break;
        case 'update':
            if (
                empty($_REQUEST['menu_text']) ||
                !preg_match('/^[0-9]+$/', $_REQUEST['price'])
            ) break;
            $sql = $pdo->prepare('update sets set menu_text=?, price=? where id=?');
            $sql->execute(
                [htmlspecialchars($_REQUEST['menu_text']), $_REQUEST['price'], $_REQUEST['id']]
            );
            save_set_products($_REQUEST['id']);
            break;
        case 'delete':
            $pdo->prepare('delete from setmenu where set_id=?')->execute([$_REQUEST['id']]);
            $pdo->prepare('delete from sets where id=?')->execute([$_REQUEST['id']]);
            break;
    }
}

$products = $pdo->query('select * from product')->fetchAll();

foreach ($pdo->query('select * from sets') as $row) {
    $set_id = $row['id'];
    $selected_sql = $pdo->prepare('select product_id from setmenu where set_id=?');
    $selected_sql->execute([$set_id]);
    $selected_ids = $selected_sql->fetchAll(PDO::FETCH_COLUMN);

    echo '<div class="product-row">';
    echo '<form class="ib" action="set-edit.php" method="post">';
    echo '<input type="hidden" name="command" value="update">';
    echo '<input type="hidden" name="id" value="' . $set_id . '">';
    echo '<div class="td0">' . $set_id . '</div>';
    echo '<div class="td1"><input type="text" name="menu_text" value="' . htmlspecialchars($row['menu_text']) . '"></div>';
    echo '<div class="td1"><input type="text" name="price" value="' . $row['price'] . '"></div><br>';

    echo '<div class="product-checks">対象商品：';
    foreach ($products as $product) {
        $checked = in_array($product['id'], $selected_ids) ? ' checked' : '';
        echo '<label><input type="checkbox" name="product_ids[]" value="' . $product['id'] . '" data-price="' . $product['price'] . '"' . $checked . '>' . htmlspecialchars($product['name']) . ':' . $product['price'] . '円</label>';
    }
    echo '</div>';

    echo '<div class="price-summary">本来の価格：<span class="original-price-value">0</span>円</div>';

    echo '<div class="td2"><input type="submit" value="更新"></div>';
    echo '</form>';

    echo '<form class="ib" action="set-edit.php" method="post">';
    echo '<input type="hidden" name="command" value="delete">';
    echo '<input type="hidden" name="id" value="' . $set_id . '">';
    echo '<input type="submit" value="削除">';
    echo '</form><br>';
    echo '</div>';
}

?>

<form action="set-edit.php" method="post">
    <input type="hidden" name="command" value="insert">
    <div class="td0"></div>
    <div class="td1"><input type="text" name="menu_text" placeholder="セット名"></div>
    <div class="td1"><input type="text" name="price" placeholder="価格"></div>
    <div class="product-checks">対象商品：

        <?php foreach ($products as $product): ?>
            <label><input type="checkbox" name="product_ids[]" value="<?= $product['id'] ?>" data-price="<?= $product['price'] ?>"><?= htmlspecialchars($product['name']) ?>:<?= htmlspecialchars($product['price']) ?>円</label>
        <?php endforeach; ?>
    </div>

    <div class="price-summary">本来の価格：<span class="original-price-value">0</span>円</div>

    <div class="td2"><input type="submit" value="追加"></div>
</form>
<br>
<a href="../user/login-input.php">ユーザー画面に戻る</a>
<a href="./edit3.php">商品編集画面</a>

<script>
    document.querySelectorAll('form').forEach(function(form) {
        var checks = form.querySelector('.product-checks');
        var value = form.querySelector('.original-price-value');
        if (!checks || !value) return;

        function updateTotal() {
            var total = 0;
            checks.querySelectorAll('input[type="checkbox"]:checked').forEach(function(checkbox) {
                total += Number(checkbox.dataset.price) || 0;
            });
            value.textContent = total.toLocaleString();
        }

        checks.addEventListener('change', updateTotal);
        updateTotal();
    });
</script>

<?php require '../footer.php'; ?>