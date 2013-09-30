<?php
class mysql {
		private $servername="192.168.30.51";
		private $username="andreatest";
		private $db="andreatest";
		private $password="andreatest";
		private $con;
	function connect() {
    	$this->con = mysql_connect($this->servername, $this->username, $this->password, $this->db);
		/*if (mysql_connect_errno($this->con)){
			echo "failed" . mysql_connnect_error();
			}*/
		echo "sono passato";
	}
	function insert() {
		mysql_query($this->con,"INSERT INTO Questionario (Domande, Risposta1, Risposta2, Risposta3)
		VALUES ('questa è una domanda', 'questa è una risposta', 'questa è la seconda', 'questa è la terza')");
	}
}
$mysql2 = new mysql();
$mysql2->connect();
$mysql2->insert();

?>