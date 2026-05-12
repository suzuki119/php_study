<?php require '../header.php'; ?>
<?php
$text="商品の色を選択してください";

if($_SERVER['REQUEST_METHOD']==='POST'){
$colortext=$_REQUEST['color'];
$text="商品の色は";

    echo $text,$colortext;
};
?>
<form action="select-out.php" method="post">
    <p>商品の色は?</p>

    <select name="color">
        <?php
        $colors=["赤","青","緑"];
        foreach($colors as $color){
            echo '<option value="',$color,'">',$color,'</option>';
        };
        ?>

    </select>
    <input type="submit" value="確定">

</form>

<?php require '../footer.php'; ?>