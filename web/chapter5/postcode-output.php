<?php require '../header.php'; ?>
<?php
// データ postcode を表示する
// preg_match で数値7桁を判定する
$int = $_REQUEST['index'];


if (preg_match('/^[0-9]{7}$/', $int)) {
    echo '郵便番号は', $int;
} else {
    echo "なにそれ";
}

?>
<?php require '../footer.php'; ?>
