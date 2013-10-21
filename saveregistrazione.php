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




function registra()
{
document.frm.action = "registra.php";
document.frm.submit();

}	

</script>

</head>
<body>

<?php

$oggi = date ("Ymd H:i:s");
$dataoggi =  date ("Ymd");
$oraoggi  = date ("H:i:s");
$user = $_SESSION['user'];

if (isset($_POST['nome']))
{ $nome = $_POST['nome'] ; }
else
{ $nome = ""; }

if (isset($_POST['cognome']))
{ $cognome = $_POST['cognome'] ; }
else
{ $cognome = ""; }

if (isset($_POST['email']))
{ $email = $_POST['email'] ; }
else
{ $email = ""; }

if (isset($_POST['nascita']))
{ $nascita = $_POST['nascita'] ; }
else
{ $nascita = ""; }

if (isset($_POST['via']))
{ $via = $_POST['via'] ; }
else
{ $via = ""; }

if (isset($_POST['citta']))
{ $citta = $_POST['citta'] ; }
else
{ $citta = ""; }

if (isset($_POST['provincia']))
{ $provincia = $_POST['provincia'] ; }
else
{ $provincia = ""; }

if (isset($_POST['cap']))
{ $cap = $_POST['cap'] ; }
else
{ $cap = ""; }

if (isset($_POST['telefono']))
{ $telefono = $_POST['telefono'] ; }
else
{ $telefono = ""; }

if (isset($_POST['privacy']))
{ $privacy = $_POST['privacy'] ; }
else
{ $privacy = ""; }

if ( $nome == "" Or $cognome  == "" Or $email  == "" Or $nascita  == "" Or $via  == "" Or $citta  == "" Or $provincia  == "" Or $cap  == "" Or $telefono  == "" Or $privacy  == "")
{
?>
<body >
<form name="frm" id="frm" action="saveregistrazione.php" method="post">
<input type="hidden" name="nome" value="<? echo $nome ?>">
<input type="hidden" name="cognome" value="<? echo $cognome ?>">
<input type="hidden" name="email" value="<? echo $email ?>">
<input type="hidden" name="nascita" value="<? echo $nascita ?>">
<input type="hidden" name="via" value="<? echo $via ?>">
<input type="hidden" name="citta" value="<? echo $citta ?>">
<input type="hidden" name="provincia" value="<? echo $provincia ?>">
<input type="hidden" name="cap" value="<? echo $cap ?>">
<input type="hidden" name="telefono" value="<? echo $telefono ?>">
<input type="hidden" name="privacy" value="<? echo $privacy ?>">


<table width="760" height="831" align="center" cellpadding="0" cellspacing="0" background="immagini/FormIncompleto.jpg" >
<tr><td height="573" >&nbsp;</td>
</tr>

<tr><td height="111" align="center" ><img src="immagini/btn_Indietro.png" onClick="registra();" style="cursor:pointer"></td>
</tr>
<tr><td  >&nbsp;</td></tr>
</table>
</form>

</body>
<? 
exit;
 }

else
{
// salva dati form
$con     = mysqli_connect("192.168.30.51","andreatest","andreatest","andreatest");
$strsql  = "UPDATE utenti SET nome = '".$nome."',cognome = '".$cognome."',email = '".$email."',nascita = '".$nascita."',via = '".$via."',citta = '".$citta."',provincia = '".$provincia."',cap = '".$cap."',telefono = '".$telefono."', compilato = 1,data_compilazione_form = '".$oggi."' WHERE user = '" . $user."'"; 
mysqli_query($con,$strsql); 
 header("location: invita.php"); 
 exit;

}
}
else // sessione scaduta
{  
header("location: blank.php"); 
}
?>
</html>