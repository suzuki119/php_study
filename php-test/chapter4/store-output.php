
<?php require '../header.php'; ?>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "店舗コードは", $_REQUEST['store'];
};


?>


<?php require '../footer.php'; ?>