<?php require '../header.php'; ?>
<?php
// データ message をファイルに保存する
// 保存形式は json
// board.txt というテキストファイルに保存する
// 既にファイルがあれば、既存のデータに追記する
// ファイルがなければ、新規作成する
// HTMLタグは変換して保存する
// 既存のデータも含め、メッセージを表示する

$file = 'board.json';
if (file_exists($file)) {
    $board = json_decode(file_get_contents($file));
}
$board[] = htmlspecialchars($_REQUEST['text']);
file_put_contents($file, json_encode($board));
foreach ($board as $message) {
    echo '<p>' . $message . '</p>';
}

?>
<?php require '../footer.php'; ?>
