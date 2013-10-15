<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" 
<meta http-equiv="Content-type" value="text/html; charset=UTF-8" />
<?
session_start();
?>
<html xmlns:fb="https://www.facebook.com/2008/fbml">
<head>
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
if  (isset($_POST['risposta']))  {
$risposta = $_POST['risposta']; }

else {
			?>
			<script language="javascript">
			history.go(-1)
			</script>
			<? exit;
			}



if ($risposta != "corr" )
{
header("location: sbagliata.php"); 
exit;
} 


$con     = mysqli_connect("192.168.30.51","andreatest","andreatest","andreatest");
// scelgo la seconda domanda 
$strsql  = "SELECT * FROM domande WHERE categoria = 'CURIOSITA' ";
$result  = mysqli_query($con,$strsql);
$row_cnt = $result->num_rows;
$numdom = rand(1, $row_cnt);

$mul = 1;
while ($mul <= $numdom) {
$row= $result->fetch_assoc();
$mul++;
} 


$numris = rand(1, 3);
$corretta = htmlentities($row['corretta']);
$errata1 = htmlentities($row['errata1']);
$errata2 = htmlentities($row['errata2']);
?>
<form name="frm" id="frm" action="D4.php" method="post">
<table width="810" height="700" align="center" cellpadding="0" cellspacing="0" background="Domanda.jpg" >
<tr><td align="center"><? echo "3/5";?></td></tr>

<tr><td><? echo htmlentities($row['domanda']);?></td></tr>
<tr><td>&nbsp;</td></tr>
<? 
if ($numris == 1) 
{ ?>
<tr><td><input type="radio" name="risposta" value="corr"> <? echo $corretta;?></td></tr>
<tr><td><input type="radio" name="risposta" value="err1"> <? echo $errata1;?></td></tr>
<tr><td><input type="radio" name="risposta" value="err2"> <? echo $errata2;?></td></tr>
<? }
if ($numris == 2) 
{ ?>
<tr><td><input type="radio" name="risposta" value="err1"> <? echo $errata1;?></td></tr>
<tr><td><input type="radio" name="risposta" value="corr"> <? echo $corretta;?></td></tr>
<tr><td><input type="radio" name="risposta" value="err2"> <? echo $errata2;?></td></tr>
<? }
if ($numris == 3) 
{ ?>
<tr><td><input type="radio" name="risposta" value="corr"> <? echo $corretta;?></td></tr>
<tr><td><input type="radio" name="risposta" value="err1"> <? echo $errata1;?></td></tr>
<tr><td><input type="radio" name="risposta" value="err2"> <? echo $errata2;?></td></tr>
<? }

?>


<tr>
<td align="center">
<input type="button" value="Avanti" onclick="vaiprox()">
</td>
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