<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
};

?>

<?php require '../header.php'; ?>

<form action="pass-output.php">
    <input type="password" name="password">
    <input type="submit" value="確定">
</form>

<?php

?>


<?php require '../footer.php'; ?>