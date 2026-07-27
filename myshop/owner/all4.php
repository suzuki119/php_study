<?php require '../header.php'; ?>


<table>
    <tr>
        <th>id</th>
        <th>商品名</th>
        <th>価格</th>
    </tr>
    <?php

    require __DIR__ . '/../db.php';

    foreach ($pdo->query('select * from product') as $row) {
        echo '<tr>';
        echo '<td>', $row['id'], '</td>';
        echo '<td>', $row['name'], '</td>';
        echo '<td>', $row['price'], '円</td>';
        echo '</tr>';
        echo "\n";
    }

    ?>
</table>
<?php require '../footer.php'; ?>