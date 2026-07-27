<?php require '../header.php'; ?>

<?php

require __DIR__ . '/../db.php';

foreach ($pdo->query('select * from product') as $row) {
    echo '<p>';
    echo $row['id'], ':';
    echo $row['name'], ':';
    echo $row['price'], '円';
    echo '</p>';
}

?>

<?php require '../footer.php'; ?>