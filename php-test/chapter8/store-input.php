<?php require '../header.php'; ?>
<?php
$store = [
    '東京' => 100,
    '大阪' => 150,
    '名古屋' => 120,
];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $index = $_REQUEST['index'];
    $price = $store[$index];
    echo $price, '円';
};
?>

<form method="post">
    <select name="index">
        <?php
        foreach ($store as $key => $value) {
            echo '<option value="', $key, '">', $key, '</option>';
        };
        ?>
    </select>
    <input type="submit" value="確定">
</form>


<?php require '../footer.php'; ?>