<?php require '../header.php'; ?>
<p>ご興味のある商品ジャンルを全て選んでください。</p>
<!--
フォームを作る
項目 チェックボックス genre
	'カメラ', 'パソコン', '時計', '家電', '書籍', '文房具', '食品'
foreach を使う
checks-output.phpへ移動する
-->
<form action="checks-output.php" method="post">
<?php
$genre=['カメラ', 'パソコン', '時計', '家電', '書籍', '文房具', '食品'];
foreach ($genre as $item) {
	echo '<p>';
	echo '<input type="checkbox" name="genre[]" value="', $item, '">';
	echo $item;
	echo '</p>';
}
?>
<p><input type="submit" value="確定"></p>
</form>
<?php require '../footer.php'; ?>
