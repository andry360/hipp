<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns:fb="https://www.facebook.com/2008/fbml">
<head>
	<title>domande</title>
</head>
<body>
<?php 
echo "ciao";

$con     = mysqli_connect("192.168.30.51","andreatest","andreatest","andreatest");
$code = rand(1, 2);
$strsql  = "SELECT * FROM domande WHERE numdom =".$code; 
$result  = mysqli_query($con,$strsql);
$row= $result->fetch_assoc();

echo $row['dom'];
?>
<br>
<?php 
echo $row['r1'];
?>
<br>
<?php 
echo $row['r2'];
?>
<br>
<?php 
echo $row['r3'];
?>


</body>
</html>