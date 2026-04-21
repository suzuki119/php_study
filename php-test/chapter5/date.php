<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){

};

?>

<?php require '../header.php'; ?>

<?php
echo '<p>',date('Y/m/d H:i:s'),'</p>';

echo '<p>',date('Y年m月d日 H時i分s秒'),'</p>';
?>


<?php require '../footer.php'; ?>