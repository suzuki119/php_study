

<?php require '../header.php'; ?>


<?php

//1ページ完結

if($_SERVER['REQUEST_METHOD'] === 'POST'){//REQUEST_METHODのPOST(submitからの送信)が送られるまで待つ
$a=$_POST["price"]*$_POST["index"];
echo $a.'円';
};
?>

<form method="post">
    個数<input type="text" name="price">
    値段<input type="text" name="index">
    <input type="submit" value="確定">
</form>




<?php require '../footer.php'; ?>
