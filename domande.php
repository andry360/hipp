<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns:fb="https://www.facebook.com/2008/fbml">
<head>
	<title>domande</title>
</head>
<body>
<?php 
$con= mysqli_connect("192.168.30.51","andreatest","andreatest","andreatest");
$strsql="SELECT * FROM utenti WHERE user = '" . $_POST['user']."'"; 

$result = mysqli_query($con,$strsql);

$row_cnt = $result->num_rows;
if ($row_cnt == 0) {
$strsql="INSERT INTO utenti (user,nome,cognome,mail) SELECT '" . $_POST['user'] . "','" . $_POST['nome'] ."','" . $_POST['cognome'] ."','" . $_POST['email'] ."'";

mysqli_query($con,$strsql);
}
else {
		$row= $result->fetch_assoc();
		
	if ($row['risposto']== 0)  {
		 echo "premi gioca per iniziare";
	}
	else {
		echo "hai già giocato";
	}
	
}
?> 

</body>
</html>