<?php $myconn = mysql_connect('192.168.30.51', 'andreatest', 'andreatest') or die('Errore...');
mysql_select_db('mio_database', $myconn) or die('Errore...');
$query = "SELECT * FROM tabella";
$result = mysql_query($query, $myconn) or die('Errore...');
$numrows = mysql_num_rows($result);
//if ($numrows==0){
 //echo "Database vuoto!", 'domandeErisposte/1.txt', 'domandeErisposte/1.txt', 'domandeErisposte/1.txt', 'domandeErisposte/1.txt'}
 
 ?>