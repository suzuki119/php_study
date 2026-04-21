<?php require '../header.php'; ?>

<?php

switch ($_REQUEST['meal']
){
    case '和食':
        echo "コメ";
        break;
    case '洋食':
                echo "パン";
        break;
    case '中華':
                echo "ラーメン";
        break;
    case 'ヴィーガン':
                echo "やさい";
        break;

};


?>

<?php require '../footer.php'; ?>