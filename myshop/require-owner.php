<?php
if (empty($_SESSION['customer']['owner'])) {
    echo 'このページは管理者のみアクセスできます。';
    require __DIR__ . '/footer.php';
    exit;
}
