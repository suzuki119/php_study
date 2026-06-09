<?php require '../header.php'; ?>
<?php
// ランダム画像 0.png 1.png 2.png
$imgName = 'item' . rand(0, 2) . '.png';
if (file_exists($imgName)) {
    echo '<img src="./', $imgName, '" alt="">';
}

// 余力のある人は、画像が存在するかどうか？ 5章7 file_exists
?>

<?php require '../footer.php'; ?>
