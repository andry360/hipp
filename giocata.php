<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" 
<meta http-equiv="Content-type" value="text/html; charset=UTF-8" />
<?
session_start();
?>
<html xmlns:fb="https://www.facebook.com/2008/fbml">
<head>
<?php
header('P3P:CP="IDC DSP COR ADM DEVi TAIi PSA PSD IVAi IVDi CONi HIS OUR IND CNT NOI DEV PSAi NAV STP DEM"' );
header('Content-type: text/html; charset=utf-8');
if (isset($_SESSION['user'] ))
{

?>
<script language="javascript">

function vaiprox()
{
document.frm.submit();

}	


</script>

</head>
<body>

<?php

$user = $_SESSION['user'];
$oggi = date ("Ymd H:i:s");
$dataoggi =  date ("Ymd");
$oraoggi  = date ("H:i:s");
$con = mysqli_connect("192.168.30.51","andreatest","andreatest","andreatest");


// controllo se oggi ha gi giocato nella tabella giocate
		
$strsql  = "SELECT * FROM giocate WHERE user = '" . $user."' and data = '".$dataoggi."'"; 
$result  = mysqli_query($con,$strsql);
$row_cnt = $result->num_rows;

if ($row_cnt > 0) { 
echo "già giocato";
  	}
else
{ 
$strsql="INSERT INTO giocate (user,data,ora) SELECT '".$user."','".$dataoggi."','".$oraoggi."'";
mysqli_query($con,$strsql); 
echo "giocata registrata";
}

}
else // sessione scaduta
{  
header("location: blank.php"); 
}
?>
</body>
</html>