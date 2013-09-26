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
class quest {
	public $domande=array(array('prima domanda','prima risposta','seconda risposta','terza risposta'),
						array("seconda domanda", "prima risposta", "seconda risposta", "terza risposta"),
						array("terza domanda","prima risposta","seconda risposta","terza risposta"));

	public function array_loop() {
		foreach ($this->$domande as $display) {
			echo $display, '<br>';
		}
	}
}
$quest1 = new quest();
$quest1 ->array_loop()
?>
</body>
</html>