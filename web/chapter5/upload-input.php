<?php require '../header.php'; ?>
<p>アップロードするファイルを指定してください。</p>
<!--
フォーム
項目 file
ファイルアップロードには、enctype="multipart/form-data"という設定が必要
upload-output.phpへ移動
-->
<form action="upload-output.php" method="post" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit" value="確定">


</form>
<?php require '../footer.php'; ?>