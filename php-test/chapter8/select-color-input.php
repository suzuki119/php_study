<?php require '../header.php'; ?>
<?php
$text = "背景の色を選択してください";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $colortext = $_REQUEST['color'];
    echo $text, $colortext;
};
?>

<style>
    .box {
        width: 200px;
        height: 200px;
        background-color: <?php echo $colortext; ?>;
        <?php
        if ($colortext === 'white') {
            echo 'border: 1px solid black;';
        }
        ?>
    }
</style>

<form method="post">
    <p>背景の色は?</p>
    <select name="color">
        <option value="red">赤</option>
        <option value="blue">青</option>
        <option value="green">緑</option>
        <option value="white">白</option>
    </select>
    <input type="submit" value="選択">
</form>

<div class="box"></div>

<?php require '../footer.php'; ?>