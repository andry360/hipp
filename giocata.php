<? session_start(); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" 
<meta http-equiv="Content-type" value="text/html; charset=UTF-8" />
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

function vaiprox() {
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

// controllo se oggi ha già giocato nella tabella giocate
		
$strsql  = "SELECT * FROM giocate WHERE user = '" . $user."' and data = '".$dataoggi."'"; 
$result  = mysqli_query($con,$strsql);
$row_cnt = $result->num_rows;

if ($row_cnt > 0) { ?>
	<table width="760" height="831" align="center" cellpadding="0" cellspacing="0" background="immagini/SecondaGiocata.jpg" >
	<tr>
    <td height="652" >&nbsp;</td>
	</tr>
	<tr>
	<td height="65" align="center">
    <fb:send href="http://freedatalabs.com/dem/Facebookapp/hippapp_andrea/atterraggio.php?presentato=<? echo $user; ?>" width="10" height="10" colorscheme="light"></fb:send>
	</td>
	</tr>
	<tr>
	<td>&nbsp;</td>
	</tr>
	</table>
<?php }
else { 
	$strsql="INSERT INTO giocate (user,data,ora) SELECT '".$user."','".$dataoggi."','".$oraoggi."'";
	mysqli_query($con,$strsql); 
?>
	<table width="760" height="831" align="center" cellpadding="0" cellspacing="0" background="immagini/SecondoGiorno.jpg">
	<tr>
	<td height="652">&nbsp;</td>
	</tr>
	<tr>
    <td height="65" align="center">
    <div id="fb-root"></div>
<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>
    <fb:send href="http://freedatalabs.com/dem/Facebookapp/hippapp_andrea/atterraggio.php?presentato=<? echo $user; ?>" width="10" height="10" colorscheme="light"></fb:send>
    </td>
	</tr>
	<tr>
    <td>&nbsp;</td>
    </tr>
	</table>
<?php
	}
}
else {
	// sessione scaduta  
	header("location: blank.php"); 
}
?>
</html>