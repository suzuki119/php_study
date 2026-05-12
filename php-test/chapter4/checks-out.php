<?php require '../header.php'; ?>
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($_REQUEST['objects'] as $object) {
        echo $object, "<br>";
    };
};
?>

<?php require '../footer.php'; ?>