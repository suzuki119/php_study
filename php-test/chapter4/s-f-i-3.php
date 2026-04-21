<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    echo $_REQUEST['index'],"個購入";

};

?>

<?php require '../header.php'; ?>
<form method="post">
    <select name="index">
        <?php
$i=0;
while($i<10){
    echo '<option value="',$i,'">',$i,'</option>';
    $i++;
}
?>
<input type="submit" value="確定">
    </select>



</form>



<?php require '../footer.php'; ?>