<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns:fb="https://www.facebook.com/2008/fbml">
<head>
	<title>Domanda</title>
<script type="text/javascript">
function refresh() {
    if(!window.location.hash) {
        window.location = window.location + '#loaded';
        window.location.reload();
    }
}
</script>
<?php 
//indispensabile per funzionare su i.e.
header('P3P:CP="IDC DSP COR ADM DEVi TAIi PSA PSD IVAi IVDi CONi HIS OUR IND CNT NOI DEV PSAi NAV STP DEM"');
?>
<style>
body {background-image:url('immagini/sfondo.jpg');
	  background-repeat: no-repeat;}
</style>
</head>
<body>
	<form name="frm1" action="domande.php" method="post"> 
<?php 
$user_profile = $facebook->api('/me','GET');
$con     = mysqli_connect("192.168.30.51","andreatest","andreatest","andreatest");
$strsql  = "SELECT * FROM utenti WHERE user = '" . $user."'"; 
$result  = mysqli_query($con,$strsql);
$row_cnt = $result->num_rows;
if ($row_cnt == 0) {
	$strsql="INSERT INTO utenti (user,nome,cognome,mail) SELECT '" . $user . "','" .  $user_profile['first_name'] ."','" . $user_profile['last_name'] ."','" .$user_profile['email'] ."'";

	mysqli_query($con,$strsql); }
else {
		$row= $result->fetch_assoc();
		
	if ($row['risposto']== 0)  {
		 echo "premi gioca per iniziare"; ?>
         <input type="submit" name="avanti" value="gioca">
		  <?php }
	else {
		echo "hai già giocato";
	}
}
?>


<input type="hidden" name="user"    value="<?php echo $user ?>" >
<input type="hidden" name="nome"    value="<?php echo $user_profile['first_name'] ?>" >
<input type="hidden" name="cognome" value="<?php echo $user_profile['last_name'] ?>" >
<input type="hidden" name="email"   value="<?php echo $user_profile['email'] ?>" >


</form>

</body>
</html>