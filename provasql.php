<?php
/*include("base_mysql.php");
 
$db = new base_mysql();

$db->connect();
*/
$con= mysqli_connect("192.168.30.51","andreatest","andreatest","andreatest");
if (mysqli_connect_errno()){
	echo "failed";
	}

mysqli_query($con,"INSERT INTO Questionario(Domande,Risposta1) VALUES ('primad','primaris')");

   

?>