<?php

const p_index=5;
$nums=["あ","い","う","え","お"];
if($_SERVER['REQUEST_METHOD'] === 'POST'){
echo $_REQUEST['num'];
};

?>

<?php require '../header.php'; ?>

    <!-- POST -->
<form method="post">
<select name="num">
<?php
foreach($nums as $num){
    echo '<option value="',$num,'">',$num,'</option>';
};
?>
</select>
<input type="submit" value="確定">
</form>

<?php require '../footer.php'; ?>