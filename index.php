<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns:fb="https://www.facebook.com/2008/fbml">
<head>
	<title>Domanda</title>
<?php 
//indispensabile per funzionare su i.e.
header('P3P:CP="IDC DSP COR ADM DEVi TAIi PSA PSD IVAi IVDi CONi HIS OUR IND CNT NOI DEV PSAi NAV STP DEM"');

?>
</head>
<body>
<?php
$domande1=array('prima domanda','prima risposta','seconda risposta','terza risposta');
$domande2 = array("seconda domanda", "prima risposta", "seconda risposta", "terza risposta");
$domande3=array("terza domanda","prima risposta","seconda risposta","terza risposta");
$array = array($domande1, $domande2, $domande3); 

	function element(){
		$domande1=array('prima domanda','prima risposta','seconda risposta','terza risposta');
	echo "ciao";
	foreach ($domande1 as $domanda) {
		echo $domanda, '<br>';
	}}

	$domande = array_rand($array);
	echo $domande;
	element();

?>
</body>
</html>