<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $postcard=$_REQUEST['postcard'];
    if(preg_match('/^[0-9]{7}$/',$postcard)){
        echo '郵便番号',$postcard,'を確認しました';
    }
    else{
        echo '郵便番号',$postcard,'は適切ではありませんでした';
    }

};

?>

<?php require '../header.php'; ?>
<form method="post">
    <input type="text" name="postcard">
    <input type="submit" value="確定">
</form>

<?php


?>


<?php require '../footer.php'; ?>