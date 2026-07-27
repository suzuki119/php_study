<?php require '../header.php'; ?>


<div class="th0">id</div>
<div class="th1">商品名</div>
<div class="th1">価格</div>
<?php

require __DIR__ . '/../db.php';

foreach ($pdo->query('select * from product') as $row) {
    echo '<form class="ib" action="edit3.php" method="post">';
    echo '<input type="hidden" name="command" value="update">';
    echo '<input type="hidden" name="id" value="', $row['id'], '">';
    echo '<div class="td0">', $row['id'], '</div>';
    echo '<div class="td1">', $row['name'], '</div>';
    echo '<div class="td1">', $row['price'], '円</div>';
    echo '<div class="td2">',
    '<input type="submit" value="更新">', '</div>';
    echo '</form>';
    echo '<form class="ib" action="edit3.php" method="post">';
    echo '<input type="hidden" name="command" value="delete">';
    echo '<input type="hidden" name="id" value="', $row['id'], '">';
    echo '<input type="submit" value="削除">', '</div>';
    echo '</form>';
    echo "\n";
}

?>

<form action="edit3.php" method="post">
    <input type="hidden" name="command" value="insert">
    </div>
    <div class="td1"><input type="text" name="name"></div>
    <div class="td1"><input type="text" name="price"></div>
    <div class="td2"><input type="submit" value="追加"></div>
</form><br>
<a href="../user/login-input.php">商品編集画面に戻る</a>
<?php require '../footer.php'; ?>