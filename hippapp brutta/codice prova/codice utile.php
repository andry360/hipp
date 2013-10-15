<?php 
$strsql = "insert into Questionario (Domande, Risposta1) select 'primad', 'primaris'";
//sapere se una tabella esiste
$db->connect();
if ($db->tableExsist("Questionario")) {
	echo "esiste";
	}
else { echo "non esiste"; }

//codice inserimento database
$params = array(
			'Domande'=>'prima domanda',
			'Risposta1'=>'prima risposta1',
			'Risposta2'=>'prima risposta2',
			'Risposta3'=>'prima rispost3',);

$db->insert("Questionario", $params);




?>