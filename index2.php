<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" 
<html xmlns:fb="https://www.facebook.com/2008/fbml">
<head>
<?php
header('P3P:CP="IDC DSP COR ADM DEVi TAIi PSA PSD IVAi IVDi CONi HIS OUR IND CNT NOI DEV PSAi NAV STP DEM"');
include 'login_php.php';
?>
<style>
body {background-image:url('immagini/Domanda.jpg');
	  background-repeat: no-repeat;}
</style>
</head>
<body>

<?php
$user_profile = $facebook->api('/me','GET');
echo $user_profile['first_name'];

?>
</body>
</html>