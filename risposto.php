<? session_start(); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" 
<meta http-equiv="Content-type" value="text/html; charset=UTF-8" />
<html xmlns:fb="https://www.facebook.com/2008/fbml">
<head>
<?php
header( 'Content-type: text/html; charset=utf-8' );

if (isset($_SESSION['user'] ))
{

?>
<script language="javascript">

function vaiprox() {
document.frm.submit();
}	

</script>

</head>

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

if ($risposta != "corr" ) { 
	header("location: sbagliata.php"); 
	exit;
} 

$oggi = date ("Ymd H:i:s");
$user = $_SESSION['user'];

if (isset($_SESSION['nome'] )){ 
	$nome = $_SESSION['nome'] ; } 
else {
	$nome = "";} 

if (isset($_SESSION['cognome'] )){ 
	$cognome = $_SESSION['cognome'] ; } 
else {
	$cognome = "";} 

if (isset($_SESSION['email'] )) { 
	$email = $_SESSION['email'] ; } 
else {
	$email = "";} 



// controllo utente
$con     = mysqli_connect("192.168.30.51","andreatest","andreatest","andreatest");
$strsql  = "SELECT * FROM utenti WHERE user = '" . $user."'"; 
$result  = mysqli_query($con,$strsql);
$row_cnt = $result->num_rows;


// se l'utente non esiste in tabella utenti lo aggiungo 
if ($row_cnt == 0) {
	$compilato = 0;
	$strsql="INSERT INTO utenti (user,nome,cognome,email,data_accesso) SELECT '".$user."','".$nome."','".$cognome."','".$email."','".$oggi."'";
	mysqli_query($con,$strsql); }
else {
// controllo che abbia compilato il form
$row= $result->fetch_assoc();
$compilato = $row['compilato'];
}

if ($compilato == 0)
 {

// form di registrazione

?>
<body onLoad="vaiprox();"></body>
<form name="frm" id="frm" action="registra.php" method="post">
<input type="hidden" name="nome" value="<? echo $nome ?>">
<input type="hidden" name="cognome" value="<? echo $cognome ?>">
<input type="hidden" name="email" value="<? echo $email ?>">
</form>
</body>
<?
// exit;
}
else // form già compilato
{  
 header("location: giocata.php"); 
 exit;
}


} else // sessione scaduta
{  header("location: blank.php");  }
?>

</html>