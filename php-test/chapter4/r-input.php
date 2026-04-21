<?php require '../header.php'; ?>

<form action="r-output.php">

<input type="radio" name="meal" value="和食" checked>和食<br>
<input type="radio" name="meal" value="洋食" checked>洋食<br>
<input type="radio" name="meal" value="中華" checked>中華<br>
<input type="radio" name="meal" value="ヴィーガン" checked>ヴィーガン<br>

<input type="submit" value="確定">


</form>

<?php require '../footer.php'; ?>