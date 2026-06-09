<?php require '../header.php'; ?>
<?php
date_default_timezone_set('Japan');

// 日付を表示する
// https://www.php.net/manual/ja/datetime.format.php
echo '<p>', date('Y/m/d H:i:s'), '</p>';
echo '<p>', date('Y年m月d日 H時i分s秒'), '</p>';
?>
<?php require '../footer.php'; ?>
