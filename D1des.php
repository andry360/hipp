<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<?
session_start();
?>

<html xmlns:fb="https://www.facebook.com/2008/fbml">
<title>Domanda 1</title>
<head>
<link href='http://fonts.googleapis.com/css?family=Rambla:400,700' rel='stylesheet' type='text/css'>
<style type="text/css">
<!--

.Stile1 {
color: #417D5E;
font-weight: bolder;
font-family: 'Rambla', sans-serif;
font-size:18px;
}

-->
</style>

<?php
//header('P3P:CP="IDC DSP COR ADM DEVi TAIi PSA PSD IVAi IVDi CONi HIS OUR IND CNT NOI DEV PSAi NAV STP DEM" Content-type: text/html; charset=utf-8' );

header( 'Content-type: text/html; charset=utf-8' );
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
if  (isset($_POST['risposta']))  
{ $risposta = $_POST['risposta']; }

else {  $risposta = "err";
	}
			

if ($risposta != "corr" )
{ header("location: sbagliata.php"); 
exit;
} 



// PRENDO LA des


$descrizione = $_POST['descrizione']; 

?>
<form name="frm" id="frm" action="D2.php" method="post">
<table width="760" height="831" align="center" cellpadding="0" cellspacing="0" background="immagini/Domande.jpg" >
<tr>
<td width="115" height="326" >&nbsp;</td>
<td width="531">&nbsp;</td>
<td width="112">&nbsp;</td>
</tr>
<tr class="Stile1">
<td height="366" >&nbsp;</td>
<td ><? echo $descrizione;?></td>
<td width="112" >&nbsp;</td>
</tr>

<tr>
<td height="66" >&nbsp;</td>
<td align="center">
  <img src="immagini/btn_Continua.png" onClick="vaiprox();" style="cursor:pointer">  
</td>
<td >&nbsp;</td>
</tr>
<tr>
<td >&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
</table>
</form>
</body>
<? 
} else
{  header("location: blank.php"); 
}
?>
</html>