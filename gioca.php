<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns:fb="https://www.facebook.com/2008/fbml">
<head>
	<title>Domanda</title>
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
<?php 
	$user_profile = $facebook->api('/me','GET');
	 
?>

<div>
<form name="frm1" action="domande.php" method="post">
<input type="hidden" name="user" value="<?php echo $user ?>" >
<input type="hidden" name="nome" value="<?php echo $user_profile['first_name'] ?>" >
<input type="hidden" name="cognome" value="<?php echo $user_profile['last_name'] ?>" >
<input type="hidden" name="email" value="<?php echo $user_profile['email'] ?>" >


<input type="submit" name="avanti" value="gioca">
</form>

</body>
</html>