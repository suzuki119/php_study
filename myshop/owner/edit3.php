<?php session_start(); ?>
<?php require '../header.php'; ?>
<?php require '../require-owner.php'; ?>
<?php

$pdo = new PDO('mysql:host=localhost;dbname=shop;charset=utf8', 'staff', 'password');

function save_product_image($id)
{
    if (!isset($_FILES['image']) || $_FILES['image']['error'] === UPLOAD_ERR_NO_FILE) {
        return;
    }
    if ($_FILES['image']['error'] !== UPLOAD_ERR_OK) {
        return;
    }
    if (@getimagesize($_FILES['image']['tmp_name']) === false) {
        return;
    }
    move_uploaded_file($_FILES['image']['tmp_name'], '../user/image/' . $id . '.jpg');
}

if (isset($_REQUEST['command'])) {
    switch ($_REQUEST['command']) {
        case 'insert';
            if (
                empty($_REQUEST['name']) ||
                !preg_match('/^[0-9]+$/', $_REQUEST['price'])
            ) break;
            $sql = $pdo->prepare('insert into product values(null, ?, ?)');
            $sql->execute([$_REQUEST['name'], $_REQUEST['price']]);
            save_product_image($pdo->lastInsertId());
            break;
        case 'update';
            if (
                empty($_REQUEST['name']) ||
                !preg_match('/^[0-9]+$/', $_REQUEST['price'])
            ) break;
            $sql = $pdo->prepare('update product set name=?, price=? where id=?');
            $sql->execute(
                [htmlspecialchars($_REQUEST['name']), $_REQUEST['price'], $_REQUEST['id']]
            );
            save_product_image($_REQUEST['id']);
            break;
        case 'delete';
            $sql = $pdo->prepare('delete from product where id=?');
            $sql->execute([$_REQUEST['id']]);
            break;
    }
}

foreach ($pdo->query('select * from product') as $row) {
    echo '<div class="product-row">';
    echo '<form class="ib" action="edit3.php" method="post" enctype="multipart/form-data">';
    echo '<input type="hidden" name="command" value="update">';
    echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
    echo '<div class="td0">' . $row['id'] . '</div>';
    echo '<div class="td1"><input type="text" name="name" value="' . htmlspecialchars($row['name']) . '"></div>';
    echo '<div class="td1"><input type="text" name="price" value="' . $row['price'] . '"></div><br>';

    echo '<div><div class="td1"><img src="../user/image/' . $row['id'] . '.jpg" alt="' . htmlspecialchars($row['name']) . '" width="60" onerror="this.remove()"></div>';
    echo '<div class="td1"><input type="file" name="image" accept="image/*"></div></div>';

    echo '</form>';


    echo '<form class="ib" action="edit3.php" method="post">';
    echo '<input type="hidden" name="command" value="delete">';
    echo '<input type="hidden" name="id" value="', $row['id'], '">';
    echo '<input type="submit" name="delete" value="削除">';
    echo '<input type="submit" name="update" value="更新">';
    echo '</form><br>';
    echo "\n";
    echo '</div>';
}


?>

<form action="edit3.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="command" value="insert">
    <div class="td0"></div>
    <div class="td1"><input type="text" name="name"></div>
    <div class="td1"><input type="text" name="price"></div>
    <div class="td1"><input type="file" name="image" accept="image/*"></div>
    <div class="td2"><input type="submit" value="追加"></div>
</form>
<br>
<a href="../user/login-input.php">商品編集画面に戻る</a>
<a href="./set-edit.php">セット編集画面</a>


<?php require '../footer.php'; ?>