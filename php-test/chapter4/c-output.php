<?php require '../header.php'; ?>
<?php
if(isset($_REQUEST['mail'])){//issetで存在チェック
echo"買い物メール送ります";
}else{
echo"買い物メール送りません";
};

?>
<?php require '../footer.php'; ?>