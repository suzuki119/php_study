<?php require '../header.php'; ?>
<?php
require __DIR__ . '/../db.php';
foreach ($pdo->query('select * from product') as $row) {
    echo '<form action="update-output.php" method="post">';
    echo '<input type="hidden" name="id" value="', $row['id'], '">';
    echo '<div class="td0">', $row['id'], '</div>';
    echo '<div class="td1">';
    echo '<input type="text" name="name" value="', $row['name'], '">';
    echo '</div>';
    echo '<div class="td1">';
    echo '<input type="text" name="price" value="', $row['price'], '">';
    echo '</div>';
    echo '<div class="td2"><input type="submit" value="更新"></div>';
    echo '</form>';
}

?>

<?php require '../footer.php'; ?>