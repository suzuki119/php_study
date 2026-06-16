<?php require '../header.php'; ?>
<?php
// is_uploaded_file で、ファイルがアップロードされたかどうかを判定する
// upload フォルダに保存する。このフォルダが無い場合は作る
// アップロードされたファイルを保存する
// ファイルを画面に表示する
// 余力のある人は、同じ名前のファイルがあるか判定する→あればエラーにする
if (is_uploaded_file($_FILES['file']['tmp_name'])) {
    if (!file_exists('uploads')) {
        mkdir('uploads');
    }

    $file = 'uploads/' . basename($_FILES['file']['name']);

    if (move_uploaded_file($_FILES['file']['tmp_name'], $file)) {
        echo "成功";
    } else {
        echo "失敗";
    }
}

?>
<?php require '../footer.php'; ?>
