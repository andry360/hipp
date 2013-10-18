<? session_start(); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" 
<meta http-equiv="Content-type" value="text/html; charset=UTF-8" />
<link href='http://fonts.googleapis.com/css?family=Rambla:400,700' rel='stylesheet' type='text/css'>
<html xmlns:fb="https://www.facebook.com/2008/fbml">
<head>
<?php
//header('P3P:CP="IDC DSP COR ADM DEVi TAIi PSA PSD IVAi IVDi CONi HIS OUR IND CNT NOI DEV PSAi NAV STP DEM" Content-type: text/html; charset=utf-8' );
header( 'Content-type: text/html; charset=utf-8' );
?>
<link href='http://fonts.googleapis.com/css?family=Rambla:400,700' rel='stylesheet' type='text/css'>
<style type="text/css">
<!--
.Stile1 {
color: #00A453;
font-weight: bolder;
font-family: 'Rambla', sans-serif;
font-size:9px;
}
.Stile2 {
color: #00A453;
font-weight: bolder;
font-family: 'Rambla', sans-serif;
font-size:16px;
}
.Stile3 {
color: #00A453;
font-weight: bolder;
font-family: 'Rambla', sans-serif;
font-size:12px;
}
-->
</style>



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
if (isset($_SESSION['user'] ))
{

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
<table width="760" height="1000" align="center" cellpadding="0" cellspacing="0" background="Form.jpg" class="Stile2" >
<tr><td height="472" colspan="5" align="center">&nbsp;</td></tr>

<tr>
<td width="59" height="30">&nbsp;</td>
<td width="176">Nome</td>
<td width="312"><input type="text" name="nome" value="<? echo $nome; ?>" maxlength="255" size="40"></td>
<td width="154">&nbsp;</td>
<td width="48">&nbsp;</td>
</tr>
<tr>
<td height="30">&nbsp;</td>
<td>Cognome</td>
<td><input type="text" name="cognome" value="<? echo $cognome; ?>" maxlength="255" size="40"></td>
<td>&nbsp;</td>
<td width="48">&nbsp;</td>
</tr>
<tr>
<td height="30">&nbsp;</td>
<td>Email</td>
<td><input type="text" name="email" value="<? echo $email; ?>" maxlength="255" size="40"></td>
<td>&nbsp;</td>
<td width="48">&nbsp;</td>

</tr>
<tr>
<td height="30">&nbsp;</td>
<td>Data nascita <span class="stile3"> (gg/mm/aa) </span></td>
<td><input type="text" name="nascita" value="<? echo $nascita; ?>" maxlength="255" size="40"></td>
<td>&nbsp;</td>
<td width="48">&nbsp;</td>
</tr>
<tr>
<td height="30">&nbsp;</td>
<td>Via</td>
<td><input type="text" name="via" value="<? echo $via; ?>" maxlength="255" size="40"></td>
<td>&nbsp;</td>
<td width="48">&nbsp;</td>
</tr>
<tr>
<td height="30">&nbsp;</td>
<td>Città</td>
<td><input type="text" name="citta" value="<? echo $citta; ?>" maxlength="255" size="40">
</td>
<td>Prov&nbsp;&nbsp;&nbsp;<input type="text" name="provincia" value="<? echo $provincia; ?>" maxlength="2" size="2"></td>
<td width="48">&nbsp;</td>
</tr>
<tr>
<td height="30">&nbsp;</td>
<td>CAP</td>
<td><input type="text" name="cap" value="<? echo $cap; ?>" maxlength="5" size="5"></td>
<td>&nbsp;</td>
<td width="48">&nbsp;</td>
<td width="9">&nbsp;</td>
</tr>
<tr>
<td height="30">&nbsp;</td>
<td>Telefono</td>
<td><input type="text" name="telefono" value="<? echo $telefono; ?>" maxlength="255" size="40"></td>
<td>&nbsp;</td>
<td width="48">&nbsp;</td>
</tr>
<tr><td height="19" colspan="5">&nbsp;</td>

</tr>
<tr><td height="50"></td>
<td align="right">
<? 

if ($privacy == "1") { ?>
<input type="checkbox" name="privacy" value="1" checked >
<? } 
else {
?>
<input type="checkbox" name="privacy" value="1"  >
<? }
?>
&nbsp;&nbsp;&nbsp;
</td>
<td colspan="2"><span class="Stile1">
In osservanza di quanto previsto ai sensi e per gli effetti dell'art. 13 D. Lgs 30 giugno 2003, autorizzo espressamente HiPP Italia srl all’utilizzo dei miei dati per fini informativi, di ricerca e per l’eventuale invio gratuito di materiale promozionale e pubblicitario. Dichiaro di aver letto il regolamento e di aver preso visione dell’informativa sulla privacy.
</span>
</td>
<td width="48">&nbsp;</td>
</tr>
<tr>
<td  align="center" colspan="5">
 <img src="btn_Invia.png" onClick="saveregistrazione();" style="cursor:pointer">
</td>
</tr>

<tr><td colspan="5">&nbsp;</td></tr>
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