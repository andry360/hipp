<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns:fb="https://www.facebook.com/2008/fbml">
<head>
	<title>Domanda</title>
<?php 
//indispensabile per funzionare su i.e.
header('P3P:CP="IDC DSP COR ADM DEVi TAIi PSA PSD IVAi IVDi CONi HIS OUR IND CNT NOI DEV PSAi NAV STP DEM"');
include 'jvscript.php';
?>
</head>
<body>
<?php
$myconn = mysql_connect('localhost', 'andreatest', 'andreatest') or die('Errore...');
mysql_select_db('mio_database', $myconn) or die('Errore...');
$query = "SELECT * FROM tabella";
$result = mysql_query($query, $myconn) or die('Errore...');
$numrows = mysql_num_rows($result);
if ($numrows==0){
  echo "Database vuoto!";
}
?>
</body>
</html>