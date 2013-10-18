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

function saveregistrazione()
{
document.frm.action = "saveregistrazione.php";
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

if ( isset ($_POST['nome'] ))
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



// form di registrazione

?>
<form name="frm" id="frm" action="" method="post">
<table width="810" height="700" align="center" cellpadding="0" cellspacing="0" background="" >
<tr><td align="center" colspan="2">Registrazione</td></tr>

<tr><td colspan="2">&nbsp;</td></tr>
<tr><td>Nome</td>
<td><input type="text" name="nome" value="<? echo $nome; ?>" maxlength="255" size="40"></td>
</tr>
<tr><td>Cognome</td>
<td><input type="text" name="cognome" value="<? echo $cognome; ?>" maxlength="255" size="40"></td>
</tr>
<tr><td>Email</td>
<td><input type="text" name="email" value="<? echo $email; ?>" maxlength="255" size="40"></td>


</tr>
<tr><td>Data nascita</td>
<td><input type="text" name="nascita" value="<? echo $nascita; ?>" maxlength="255" size="40"></td>
</tr>
<tr><td>Via</td>
<td><input type="text" name="via" value="<? echo $via; ?>" maxlength="255" size="40"></td>
</tr>
<tr><td>Città</td>
<td><input type="text" name="citta" value="<? echo $citta; ?>" maxlength="255" size="40"></td>
</tr>
<tr><td>Provincia</td>
<td><input type="text" name="provincia" value="<? echo $provincia; ?>" maxlength="2" size="2"></td>
</tr>
<tr><td>CAP</td>
<td><input type="text" name="cap" value="<? echo $cap; ?>" maxlength="5" size="5"></td>
</tr>
<tr><td>Telefono</td>
<td><input type="text" name="telefono" value="<? echo $telefono; ?>" maxlength="255" size="40"></td>
</tr>
<tr><td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr><td>

<? 

if ($privacy == "1") { ?>
<input type="checkbox" name="privacy" value="1" checked >
<? } 
else {
?>
<input type="checkbox" name="privacy" value="1"  >
<? }
?>

Accetto </td>
<td>&nbsp;</td>
</tr>
<tr><td colspan="2">
<input type="button" value="avanti" name="avanti" onClick="saveregistrazione()">
 </td>
</tr>

</table>
</form>

</body>
<? 
} 

else // sessione scaduta
{  header("location: blank.php"); 
}
?>
</html>