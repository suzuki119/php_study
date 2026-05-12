<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "店舗コードは", $_REQUEST['store'];
};

?>

<?php require '../header.php'; ?>
<p>店舗を選んでください</p>

<form action="store-output.php" method="post">
    <select name="store">
        <?php
        $stores = ["新宿" => 100, "秋葉原" => 101, "新新宿" => 102, "新秋葉原" => 103, "sin新宿" => 104, "sin秋葉原" => 105];

        foreach ($stores as $store => $value) {
            echo '<option value="', $value, '">', $store, '</option>';
        }
        ?>
    </select>
    <input type="submit" value="確定">
</form>


<?php require '../footer.php'; ?>