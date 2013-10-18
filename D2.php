<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<?
session_start();
?>

<html xmlns:fb="https://www.facebook.com/2008/fbml">
<title>Domanda 2</title>
<head>
<link href='http://fonts.googleapis.com/css?family=Rambla:400,700' rel='stylesheet' type='text/css'>
<style type="text/css">
<!--

.Stile1 {
color: #417D5E;
font-weight: bolder;
font-family: 'Rambla', sans-serif;
font-size:28px;
}
.Stile2 {
color: #00A453;
font-weight: bolder;
font-family: 'Rambla', sans-serif;
font-size:22px;
}

.Stile3 {
color: #00A453;
font-weight: bolder;
font-family: 'Rambla', sans-serif;
font-size:32px;
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
// PRENDO LA RISPOSTA


$con     = mysqli_connect("192.168.30.51","andreatest","andreatest","andreatest");
// scelgo la seconda domanda 
$strsql  = "SELECT * FROM domande WHERE categoria = 'Blocco2' ";
$result  = mysqli_query($con,$strsql);
$row_cnt = $result->num_rows;
$numdom = rand(1, $row_cnt);

$mul = 1;
while ($mul <= $numdom) {
$row= $result->fetch_assoc();
$mul++;
} 


$numris = rand(1, 3);
$corretta = $row['corretta'];
$errata1 = $row['errata1'];
$errata2 = $row['errata2'];
$aiutino = $row['aiutino'];
$descrizione  = $row['descrizione'];

?>
<form name="frm" id="frm" action="D2des.php" method="post">
<input type="hidden" name="descrizione" value="<? echo $descrizione ?>">
<table width="760" height="831" align="center" cellpadding="0" cellspacing="0" background="Domande.jpg" class="Stile2" >
<tr><td height="243" colspan="5" >&nbsp;</td>
</tr>
<tr><td align="center" colspan="5"><span class="Stile3"><? echo "2/5";?></span></td>
</tr>
<tr class="Stile1">
<td width="68">&nbsp;</td>
<td width="33">&nbsp;</td>
<td colspan="2"><? echo $row['domanda'];?></td>
<td width="58">&nbsp;</td>
</tr>

<? 
if ($numris == 1) 
{ ?>
<tr >
<td>&nbsp;</td>
<td><input type="radio" name="risposta" id="risposta" value="corr"> 
</td><td colspan="2">
<? echo $corretta;?></td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td><input type="radio" name="risposta"  id="risposta"  value="err">
</td><td colspan="2">
 <? echo $errata1;?></td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td><input type="radio" name="risposta"  id="risposta"  value="err"> 
</td><td colspan="2">
<? echo $errata2;?></td>
<td>&nbsp;</td>
</tr>
<? }
if ($numris == 2) 
{ ?>
<tr>
<td>&nbsp;</td>
<td><input type="radio" name="risposta"  id="risposta"  value="err">
</td><td colspan="2">
 <? echo $errata1;?></td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td><input type="radio" name="risposta" id="risposta"  value="corr">
</td><td colspan="2">
 <? echo $corretta;?></td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td><input type="radio" name="risposta" id="risposta"  value="err"> 
</td><td colspan="2">
<? echo $errata2;?></td>
<td>&nbsp;</td>
</tr>
<? }
if ($numris == 3) 
{ ?>

<tr>
<td>&nbsp;</td>
<td><input type="radio" name="risposta" id="risposta"  value="err">
</td><td colspan="2">
 <? echo $errata1;?></td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td><input type="radio" name="risposta" id="risposta"  value="err"> 
</td><td colspan="2">
<? echo $errata2;?></td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td><input type="radio" name="risposta" id="risposta"  value="corr">
</td><td colspan="2">
 <? echo $corretta;?></td>
<td>&nbsp;</td>
</tr>
<? }

?>

<tr><td height="26" colspan="5"  >&nbsp;</td>
<tr>
<td height="61">&nbsp;</td>
<td>&nbsp;</td>
<td width="253" >
  <a href="<? echo $aiutino ?>" target="_blank"><img src="btn_Aiutino.png" border="0"></a> 
  <br>&nbsp;
  </td>

<td width="346">
  
  <img src="btn_Avanti.png" onClick="vaiprox();" style="cursor:pointer">
  
</td>

<td>&nbsp;</td>
</tr>
<tr><td colspan="5" height="70" >&nbsp;</td>
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