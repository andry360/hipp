<?php
class quest {
	public $domande=array("domanda1"=>array("prima domanda","prima risposta","seconda risposta","terza risposta"),
						"domanda2"=>array("seconda domanda", "prima risposta", "seconda risposta", "terza risposta"),
						"domanda3"=>array("terza domanda","prima risposta","seconda risposta","terza risposta"));

	public function array_loop() {
	  
	}
}
$quest1 = new quest();
$quest1 ->array_loop();
$quest1->$domande["domanda1"][1];
?>