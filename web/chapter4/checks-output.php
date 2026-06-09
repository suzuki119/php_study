<?php require '../header.php'; ?>
<?php
// データ genre を出力する
if (isset($_REQUEST['genre'])) {
    foreach ($_REQUEST['genre'] as $item) {
        echo $item;
    }
}

?>
<?php require '../footer.php'; ?>
