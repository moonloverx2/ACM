<html>
<title>A+B Problem</title>
<body>
<form method="post" action="1_AaddB.php">
<input type="text" name="a">
<input type="text" name="b">
<input type="submit" value="submit">
</form>
</body>
</html>

<?php
$a = $_POST['a'];
$b = $_POST['b'];
echo $a+$b;
?>