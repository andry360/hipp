<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" 
<?
session_start();
?>
<html xmlns:fb="http://ogp.me/ns/fb#">
<head>
<?php
header('P3P:CP="IDC DSP COR ADM DEVi TAIi PSA PSD IVAi IVDi CONi HIS OUR IND CNT NOI DEV PSAi NAV STP DEM"');
include 'login_php.php';
include 'login_jvscript.php';
?>
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
echo date ("Ymd H:i:s");
/*
$con     = mysqli_connect("192.168.30.51","andreatest","andreatest","andreatest");
$strsql  = "SELECT * FROM utenti WHERE user = '" . $user."'"; 
$result  = mysqli_query($con,$strsql);
$row_cnt = $result->num_rows;

// se l'utente non esiste in tabella utenti lo aggiungo DEVO AGGIUNGERE CHI LO HA PRESENTATO
if ($row_cnt == 0) {
	$strsql="INSERT INTO utenti (user,nome,cognome,mail) SELECT '".$user."','".$_SESSION['nome']."','".$_SESSION['cognome']."','".$_SESSION['email']."'";
	mysqli_query($con,$strsql); }
else {
// controllo se oggi ha già giocato nella tabella giocate
		
	$row= $result->fetch_assoc();
		
	if ($row['risposto']== 0)  {
		 echo "premi gioca per iniziare"; ?>
         <input type="submit" name="avanti" value="gioca">
		  <?php }
	else {
		echo "hai già giocato";
	}
}*/
?>

<fb:send href="https://www.facebook.com/Provafan/app_190130531171231?presentato=<? echo $user; ?>" width="10" height="10" colorscheme="light"></fb:send>


</body>
</html>