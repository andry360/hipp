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
//function redirect(){
	//location.href = "index2.php";
	
//}

 /*FB.init({
        appId:'610732638955892',    // Your Application ID
		 secret:'148fd7c1d90389e431bd7420d29b45cc',
        cookie:true,                // Enabling cookie support
        status:true,                // Fetch fresh status
        xfbml:true                  // Parse XFBML tags
 //   });

function inviteFriends() {
    FB.ui({ method: 'apprequests',
        message: 'Gioca a sto cazzo di HiPP App e smaltisci un bambino'});
} */
</script> 

<?php

$signed_request = parsePageSignedRequest(); 


if($signed_request->page->liked) { include ('postLike.php');
			/*?> 
			//<button type="button" value="Condividi" onclick="inviteFriends()"</button>
         <?php */} else {
            include ('preLike.php');
		}
?>
</body>
</html>