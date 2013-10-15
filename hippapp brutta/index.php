<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" 
<html xmlns:fb="https://www.facebook.com/2008/fbml">
<head>
<?php
header('P3P:CP="IDC DSP COR ADM DEVi TAIi PSA PSD IVAi IVDi CONi HIS OUR IND CNT NOI DEV PSAi NAV STP DEM"');
include 'login_jvscript.php';
include 'login_php.php';
?>
</head>
<body>
<script>
function redirect(){
	location.href = "index2.php";
}
</script>
<?php

$signed_request = parsePageSignedRequest(); 

if($signed_request) {
			?> <button type="button" onclick="redirect()">Click Me!</button>
		<?php } else {
            include ('preLike.php');
		}
?>
</body>
</html>