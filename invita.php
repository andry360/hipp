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

include 'login_jvscript.php';
include 'login_php.php';



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
$strsql="INSERT INTO giocate (user,data,ora) SELECT '".$user."','".$dataoggi."','".$oraoggi."'";
mysqli_query($con,$strsql); 
?>

<table width="760" height="831" align="center" cellpadding="0" cellspacing="0" background="Invita.jpg" >
<tr><td height="652" >&nbsp;</td>
</tr>
<div id="fb-root"></div>
<tr><td height="65" align="center" ><a href='https://freedatalabs.com/dem/Facebookapp/hipapp/atterraggio.php?presentato=<? echo $user; ?>'><img src="btn_InvitaAmici.png" border="0"  style="cursor:pointer" onClick="FacebookInviteFriends();"></a></td>
</tr>
<tr><td  >&nbsp;</td></tr>
</table>



<?
}
else // sessione scaduta
{  
header("location: blank.php"); 
}
?>

</a>


</html>