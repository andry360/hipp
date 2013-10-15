<?php
header('P3P:CP="IDC DSP COR ADM DEVi TAIi PSA PSD IVAi IVDi CONi HIS OUR IND CNT NOI DEV PSAi NAV STP DEM"');
include 'facebook.php';

	function parsePageSignedRequest() {
		if (isset($_REQUEST['signed_request'])) {
		$encoded_sig = null;
		$payload = null;
		list($encoded_sig, $payload) = explode('.', $_REQUEST['signed_request'], 2);
		$sig = base64_decode(strtr($encoded_sig, '-_', '+/'));
		$data = json_decode(base64_decode(strtr($payload, '-_', '+/'), true));
		return $data;
    	}
    return false;
	}
	
	$facebook = new Facebook(array(
	'appId'  => '190130531171231',
	'secret' => 'e36cc40965aac4611635e54956f08a85',
	'cookie' => true,
	'oauth' => true,
	));
	$user = $facebook->getUser();
?>