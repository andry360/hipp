<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" 
<?
session_start();
?>
<html xmlns:fb="https://www.facebook.com/2008/fbml">
<meta http-equiv="Content-type" value="text/html; charset=UTF-8" />
<head>
<?php
header('P3P:CP="IDC DSP COR ADM DEVi TAIi PSA PSD IVAi IVDi CONi HIS OUR IND CNT NOI DEV PSAi NAV STP DEM"' );
header('Content-type: text/html; charset=utf-8');
include 'login_php.php';
include 'login_jvscript.php';
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
// definisco le variabili di sessione
$user_profile = $facebook->api('/me','GET');
$_SESSION['user']=$user;
$_SESSION['nome'] = $user_profile['first_name'];
$_SESSION['cognome'] = $user_profile['last_name'];
$_SESSION['email'] = $user_profile['email'];
//echo $user;
$oggi = date ("Ymd H:i:s");
$dataoggi =  date ("Ymd");
$oraoggi  = date ("H:i:s");

$con     = mysqli_connect("192.168.30.51","andreatest","andreatest","andreatest");
//$strsql  = "SET CHARACTER SET utf8"
//mysql_query($con, $strsql);
$strsql  = "SELECT * FROM utenti WHERE user = '" . $user."'"; 
$result  = mysqli_query($con,$strsql);
$row_cnt = $result->num_rows;

// se l'utente non esiste in tabella utenti lo aggiungo DEVO AGGIUNGERE CHI LO HA PRESENTATO
if (isset($_POST['present'])) {
	$presentato= $_POST['present'];}
else {
	$presentato= "";}
	
if ($row_cnt == 0) {
		$strsql="INSERT INTO utenti (user,nome,cognome,email,data_accesso,presentatoda) SELECT '".$user."','".$_SESSION['nome']."','".$_SESSION['cognome']."','".$_SESSION['email']."','".$oggi."','".$presentato."'";
	mysqli_query($con,$strsql); }
	else {
	// controllo se oggi ha gi giocato nella tabella giocate
		
		$strsql  = "SELECT * FROM giocate WHERE user = '" . $user."' and data = '".$dataoggi."'"; 
		$result  = mysqli_query($con,$strsql);
		$row_cnt = $result->num_rows;

		if ($row_cnt > 0) { 
			echo "hai giocato per oggi";
		}
	}

// scelgo la prima domanda 
$strsql  = "SELECT * FROM domande WHERE categoria = 'BIO' ";
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
$aiutino = htmlentities($row['aiutino']);

//ATTENZIONE ////////////////// VAI A RISPOSTO PER TEST. PRODUZIONE D2.PHP
?>
<form name="frm" id="frm" action="risposto.php" method="post">
<tr><td align="center"><? echo "1/5";?></td></tr>
<table width="810" height="700" align="center" cellpadding="0" cellspacing="0" background="Domanda.jpg" >
<tr><td><? echo htmlentities($row['domanda']);?></td></tr>
<tr><td>&nbsp;</td></tr>
<? 
if ($numris == 1) 
{ ?>
<tr><td><input type="radio" name="risposta" id="risposta" value="corr"> <? echo $corretta;?></td></tr>
<tr><td><input type="radio" name="risposta"  id="risposta"  value="err"> <? echo $errata1;?></td></tr>
<tr><td><input type="radio" name="risposta"  id="risposta"  value="err"> <? echo $errata2;?></td></tr>
<? }
if ($numris == 2) 
{ ?>
<tr><td><input type="radio" name="risposta"  id="risposta"  value="err"> <? echo $errata1;?></td></tr>
<tr><td><input type="radio" name="risposta" id="risposta"  value="corr"> <? echo $corretta;?></td></tr>
<tr><td><input type="radio" name="risposta" id="risposta"  value="err"> <? echo $errata2;?></td></tr>
<? }
if ($numris == 3) 
{ ?>

<tr><td><input type="radio" name="risposta" id="risposta"  value="err"> <? echo $errata1;?></td></tr>
<tr><td><input type="radio" name="risposta" id="risposta"  value="err"> <? echo $errata2;?></td></tr>
<tr><td><input type="radio" name="risposta" id="risposta"  value="corr"> <? echo $corretta;?></td></tr>
<? }

?>
<fb:send href="http://freedatalabs.com/dem/Facebookapp/hippapp_andrea/atterraggio.php?presentato=<? echo $user; ?>" width="10" height="10" colorscheme="light"></fb:send>

<tr>
<td align="center">
  <a href="<? echo $aiutino ?>" target="_blank"><img src="aiutino.jpg" border="0"></a>
<input type="button" value="Avanti" onclick="vaiprox()">
</td>
</tr>
</table>
</form>
</body>
</html>