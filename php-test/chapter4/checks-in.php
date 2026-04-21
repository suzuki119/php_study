<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    foreach($_REQUEST['objects'] as $object){
    echo $object,"<br>";
    };


};

?>

<?php require '../header.php'; ?>

<form method="post">
<?php
$objects=["家電","工具","テレビ","カメラ"];
foreach($objects as $object){
    echo $object;
    echo '<input type="checkbox" name="objects[]" value="',$object,'">';
};
?>
<input type="submit" value="確定">
</form>


<?php require '../footer.php'; ?>