<?php
include("base_mysql.php");
 
$db = new base_mysql();
 /*
$config = array(
	'db_host'=>'192.168.30.51',
	'db_user'=>'andreatest',
	'db_pass'=>'andreatest',
	'db_name'=>'andreatest',
	'charset'=>'utf8'
);
 */
$db->getParams($config);
 
if ($db->connect()) {
	echo "connessione riuscita";}
else { echo "connessione fallita";}

$db->connect();
if ($db->tableExsist("Questionario")) {
	echo "esiste";
	}
else { echo "non esiste"; }

$params = array(
			'Domande'=>'prima domanda',
			'Risposta1'=>'prima risposta1',
			'Risposta2'=>'prima risposta2',
			'Risposta3'=>'prima rispost3',);

$db->insert("Questionario", $params);

?>