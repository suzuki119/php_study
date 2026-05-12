<?php require '../header.php'; ?>

<?php
$text="商品の色を選択してください";

if($_SERVER['REQUEST_METHOD']==='POST'){
$colortext=$_REQUEST['color'];
$text="商品の色は";

    echo $text,$colortext;
};
?>
<?php require '../footer.php'; ?>