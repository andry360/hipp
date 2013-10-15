<?php
/*
 * @name base_mysql2
*/
 class base_mysql {
	
	private $db_driver = 'mysqli';
	private $db_host = '192.168.30.51';
    private $db_user = 'andreatest';
    private $db_pass = 'andreatest';
    private $db_name = 'andreatest';
	private $charset = 'utf8';
	
	private $connection = false;
	private $result = false;
	private $rows = array();
	private $errorMessage = "";
	private $lastSql = "";
	
	private $tot_pages = 0;
	private $current_page = 0;
	private $querystring = "";
	
	
	
	
	 /*
     * Costruttore, permette di settare i parametri di connessione al database
	 * @param params, un array associativo contenente i parametri di connessione: 
	 *        driver, host, username, password, nome del database e set di caratteri.
	 *        Come driver si può scegliere mysql o mysqli.
     */
	function __construct($params = array()) {
		
		if (isset($params["db_driver"])) $this->db_driver = $params["db_driver"];
		if (isset($params["db_host"])) $this->db_host = $params["db_host"];
		if (isset($params["db_user"])) $this->db_user = $params["db_user"];
		if (isset($params["db_pass"])) $this->db_pass = $params["db_pass"];
		if (isset($params["db_name"])) $this->db_name = $params["db_name"];
		if (isset($params["charset"])) $this->charset = $params["charset"];
		
	}
	
	/*
     * Questo metodo permette di settare i parametri di connessione al database
	 * @param params, un array associativo contenente i parametri di connessione: 
	 *        driver, host, username, password, nome del database e set di caratteri.
	 *        Come driver si può scegliere mysql o mysqli.
     */
	public function getParams($params = array()) {
		//isset controlla se la variabile esiste
		if (isset($params["db_driver"])) $this->db_driver = $params["db_driver"];
		if (isset($params["db_host"])) $this->db_host = $params["db_host"];
		if (isset($params["db_user"])) $this->db_user = $params["db_user"];
		if (isset($params["db_pass"])) $this->db_pass = $params["db_pass"];
		if (isset($params["db_name"])) $this->db_name = $params["db_name"];
		if (isset($params["charset"])) $this->charset = $params["charset"];
		
	}
	
	/*
     * Questo metodo esegue la connessione al database
	 * @return ritorna true se la connessione è avvenuta altrimenti false
     */
	public function connect() {
		
		if (!$this->connection) {
			
			if ($this->db_driver=="mysql") {
			
				$conn = mysql_connect($this->db_host,$this->db_user,$this->db_pass);
				mysql_query("SET NAMES '" .$this->charset ."'", $conn);
				$selectDb = mysql_select_db($this->db_name,$conn);
			
			}
			else if ($this->db_driver=="mysqli") {
				
				$conn = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
				mysqli_query($conn,"SET NAMES '" .$this->charset ."'");
				
			}
			
			if ($conn) {
				
                    $this->connection = $conn;
                    return(true);
				
			}
			else return(false);
			
		}
		else return(true);
		
	}

	/*
     * Questo metodo esegue la disconnessione al database
	 * @return ritorna true se la connessione è stata chiusa altrimenti false
     */
	 public function close() {
		 
		 if ($this->connection) {
			 
			if ($this->db_driver=="mysql") {
			 
				if (mysql_close($this->connection)) {
					
					$this->connection = false;
					return(true);
				
				}
				else return(false);
			
			}
			else if ($this->db_driver=="mysqli") {
				
				if (mysqli_close($this->connection)) {
					
					$this->connection = false;
					return(true);
				
				}
				else return(false);
				
			}
		 
		 }
		 else return(true);
		 
	 }

	 /*
     * Questo metodo esegue una query SQL
	 * @param sql, la query SQL da eseguire
	 * @return ritorna true se la query è stata eseguita altrimenti false
     */
	 public function query($sql='') {
		 
		 if ($this->db_driver=="mysql") $result = mysql_query($sql);
		 else if ($this->db_driver=="mysqli") $result = mysqli_query($this->connection,$sql);
		 $this->lastSql = $sql;
		 
		 if ($result) {
			 
			 $this->result = $result;
			 			 
			 return($result);
			 
		 }
		 else {
			 		if ($this->db_driver=="mysql") $this->errorMessage = mysql_error($this->connection);
					else if ($this->db_driver=="mysqli") $this->errorMessage = mysqli_error($this->connection);
			 		return(false);
		 }
		 
	 }

	 /*
     * Questo metodo restituisce l'ultima query eseguita
	 * @return ritorna l'ultima query eseguita
     */
	 public function lastQuery() {
		
		return $this->lastSql;
		 
	 }

	 /*
     * Questo metodo restituisce l'ultimo ID generato da una query INSERT
	 * @return ritorna l'ID generato dalla query INSERT
     */
	 public function lastId() {
		 
		 if ($this->db_driver=="mysql") return mysql_insert_id($this->connection);
		 else if ($this->db_driver=="mysqli") return mysqli_insert_id($this->connection);
		 
	 }
	 
	 /*
     * Questo metodo restituisce il numero di record interessati da una query SELECT
	 * @return ritorna il numero di record
     */
	 public function numRows() {
		 
		 if ($this->db_driver=="mysql") return mysql_num_rows($this->result);
		 else if ($this->db_driver=="mysqli") return mysqli_num_rows($this->result);
		 
	 }

	 /*
     * Questo metodo restituisce il numero di record interessati da una query INSERT, UPDATE o DELETE
	 * @return ritorna il numero di record
     */
	 public function affectedRows() {
		 
		 if ($this->db_driver=="mysql") return mysql_affected_rows();
		 else if ($this->db_driver=="mysqli") return mysqli_affected_rows($this->connection);
		 
	 }
 
	 /*
     * Questo metodo restituisce il messaggio di errore generato da una query fallita
	 * @return ritorna il messaggio di errore
     */
	 public function error() {
		 
		 return $this->errorMessage;
		 
	 }

	 /*
     * Questo metodo verifica se una tabella esiste nel database
	 * @param table, il nome della tabella
	 * @return ritorna true se la tabella esiste altrimenti false
     */
	 public function tableExsist($table='') {
		 
		 if ($this->db_driver=="mysql") $exsist = mysql_query('SHOW TABLES FROM '.$this->db_name.' LIKE "'.$table.'"');
		 else if ($this->db_driver=="mysqli") $exsist = mysqli_query($this->connection,'SHOW TABLES FROM '.$this->db_name.' LIKE "'.$table.'"');
		 $this->lastSql = 'SHOW TABLES FROM '.$this->db_name.' LIKE "'.$table.'"';
		 
		 if ($exsist) {
			 
			 $this->result = $exsist;
			 
			 if ($this->db_driver=="mysql") {
				 
			 	if (mysql_num_rows($exsist)==1) return(true);
			 	else return(false);
			 
			 }
			 else if ($this->db_driver=="mysqli") {
				 
			 	if (mysqli_num_rows($exsist)==1) return(true);
			 	else return(false);
			 
			 }
			 
		 }
		 else return(false);
		 
	 }

	 /*
     * Questo metodo restituisce il valore di un campo di un record in base a una condizione
	 * @param params, un array associativo contenente le informazioni per estrarre il valore:
	 * @param $params["table"], la tabella in cui leggere
	 * @param $params["field"], il campo di cui si vuole leggere il valore
	 * @param $params["condition"], la condizione da rispettare
	 * @return ritorna il valore del campo
     */
	 public function read($params = array()) {
		 
		 if (isset($params["table"])) $table = $params["table"];
		 if (isset($params["field"])) $field = $params["field"];
		 if (isset($params["condition"])) $condition = $params["condition"];
		 
		 $sql = "SELECT " .$field ." FROM " .$table ." WHERE " .$condition;
		 if ($this->db_driver=="mysql") $result = mysql_query($sql);
		 else if ($this->db_driver=="mysqli") $result = mysqli_query($this->connection,$sql);
		 $this->lastSql = $sql;
		 
		 if ($this->db_driver=="mysql") $num = mysql_num_rows($result);
		 else if ($this->db_driver=="mysqli") $num = mysqli_num_rows($result);
		 
		 if ($this->db_driver=="mysql") {
			 
		 	if ($num>0) return(mysql_result($result,0,$field));
		 	else return(false);
		 
		 }
		 else if ($this->db_driver=="mysqli") {
			 
			$row = $result->fetch_array(MYSQLI_ASSOC);
			$data = $row[$field];
			
			if ($num>0) return($data);
			else return(false);
		 
		 }
		 
	 }
 
	 /*
     * Questo metodo ripulisce le variabili che dovranno essere memorizzate nel 
	 * database tramite query INSERT/UPDATE in modo da prevenire attacchi di tipo SQL Injection
	 * @param variable, la variabile da ripulire
	 * @return ritorna la variabile ripulita
     */
	 function cleanVar($variable='') {
		 
		 $variable = stripslashes($variable);
		 if ($this->db_driver=="mysql") $variable = mysql_real_escape_string($variable);
		 else if ($this->db_driver=="mysqli") $variable = mysqli_real_escape_string($this->connection,$variable);
		 $variable = strip_tags($variable);
		 $variable = htmlentities($variable, ENT_COMPAT, "UTF-8");
		 $variable = trim($variable);
	 
		 return($variable);
		 
	 }
 
	 /*
     * Questo metodo esegue una query di tipo INSERT
	 * @param table, la tabella in cui memorizzare le informazioni
	 * @param params, un array associativo contenente le informazioni da memorizzare 
	 *        nel database. Per ogni elemento dell'array, la chiave, indica il nome 
	 *        del campo mentre, il contenuto, il valore da memorizzare
	 * @return ritorna true se la query è stata eseguita altrimenti false
     */
	 public function insert($table='',$params = array()) {
		 
		 $keys = array_keys($params);
		 $values = array_values($params);
		 
		 $fields = implode(",",$keys);
		 
		 $cleanVars = array();
		 
		 foreach($values as $value) {
			 
			$value = $this->cleanVar($value);
		 	if (is_numeric($value)===FALSE) $value = "'" .$value ."'";
			$cleanVars[] = $value;	
			
		 }
		 
		 $data = implode(",",$cleanVars);
		 
		 $sql = "INSERT INTO ";
		 $sql .= $table ." (" .$fields .") VALUES (" .$data .")";
		 
		 if ($this->db_driver=="mysql") $result = mysql_query($sql);
		 else if ($this->db_driver=="mysqli") $result = mysqli_query($this->connection,$sql);
		 $this->lastSql = $sql;
		 
		 if ($result) {
			 
			 $this->result = $result;
			 			 
			 return(true);
			 
		 }
		 else {
			 		if ($this->db_driver=="mysql") $this->errorMessage = mysql_error($this->connection);
					else if ($this->db_driver=="mysqli") $this->errorMessage = mysqli_error($this->connection);
			 		return(false);
		 }
		 
	 }
 
	 /*
     * Questo metodo esegue una query di tipo UPDATE
	 * @param table, la tabella in cui modificare le informazioni
	 * @param params, un array associativo contenente le informazioni da modificare 
	 *        nel database. Per ogni elemento dell'array, la chiave, indica il 
	 *        nome del campo mentre, il contenuto, il valore da modificare
	 * @param where, la condizione da rispettare
	 * @return ritorna true se la query è stata eseguita altrimenti false
     */
	 public function update($table='',$params = array(),$where=NULL) {
		 
		 if ($where!=NULL) {
		 
			 $keys = array_keys($params);
			 $values = array_values($params);
			 
			 $data = array();
			 
			 for($i=0;$i<count($keys);$i++) {
				 
				$values[$i] = $this->cleanVar($values[$i]);
				if (is_numeric($values[$i])===FALSE) $values[$i] = "'" .$values[$i] ."'";
				
				$data[] = $keys[$i]	."=" .$values[$i];
				
			 }
			 
			 $sql = "UPDATE " .$table ." SET " .implode(',',$data) ." WHERE " .$where;
			 
			 if ($this->db_driver=="mysql") $result = mysql_query($sql);
			 else if ($this->db_driver=="mysqli") $result = mysqli_query($this->connection,$sql);
			 $this->lastSql = $sql;
			 
			 if ($result) {
				 
				 $this->result = $result;
							 
				 return(true);
				 
			 }
			 else {
						if ($this->db_driver=="mysql") $this->errorMessage = mysql_error($this->connection);
						else if ($this->db_driver=="mysqli") $this->errorMessage = mysqli_error($this->connection);
						return(false);
			 }
		 
		 }
		 else return(false);
		 
	 }

	 /*
     * Questo metodo esegue una query di tipo DELETE
	 * @param table, la tabella in cui eliminare le informazioni
	 * @param where, la condizione da rispettare
	 * @return ritorna true se la query è stata eseguita altrimenti false
     */
	 public function delete($table='',$where=NULL) {
		 
		 if ($where!=NULL) {
		 
			 $sql = "DELETE FROM " .$table ." WHERE " .$where;
			 if ($this->db_driver=="mysql") $result = mysql_query($sql);
			 else if ($this->db_driver=="mysqli") $result = mysqli_query($this->connection,$sql);
			 $this->lastSql = $sql;
			 
			 if ($this->db_driver=="mysql") $num = mysql_affected_rows();
			 else if ($this->db_driver=="mysqli") $num = mysqli_affected_rows($this->connection);
			 
			 if ($num>0) return(true);
			 else {
				
					if ($this->db_driver=="mysql") $this->errorMessage = mysql_error($this->connection);
					else if ($this->db_driver=="mysqli") $this->errorMessage = mysqli_error($this->connection);
					return(false);
				 
			 }
		 
		 }
		 else return(false);
		 
	 }
	 
	 /*
     * Questo metodo conta il numero di record che corrispondono a una query
	 * @param params, un array associativo contenente i parametri di configurazione della query:
	 * @param $params["table"], la tabella
	 * @param $params["field"], il campo
	 * @param $params["where"], la condizione da rispettare
	 * @return ritorna il numero di record altrimenti false se la query fallisce
     */
	 function countRow($params = array()) {
		 
		 $table = "";
		 $field = "*";
		 $where = NULL;
		 
		 if (isset($params["table"])) $table = $params["table"];
		 if (isset($params["field"])) $field = $params["field"];
		 if (isset($params["where"])) $where = $params["where"];
		 
		 $sql = "SELECT COUNT(" .$field .") FROM " .$table;
		 if ($where!=NULL) $sql .= ' WHERE ' .$where;
		 
		 if ($this->db_driver=="mysql") $result = mysql_query($sql);
		 else if ($this->db_driver=="mysqli") $result = mysqli_query($this->connection,$sql);
		 $this->lastSql = $sql;
		 
		 if ($result) {
			 
			 $this->result = $result;
			 	
			 if ($this->db_driver=="mysql") $num = mysql_fetch_array($result);
			 else if ($this->db_driver=="mysqli") $num = mysqli_fetch_array($result);
			 return($num[0]);			 
			 
		 }
		 else {
			 		if ($this->db_driver=="mysql") $this->errorMessage = mysql_error($this->connection);
					else if ($this->db_driver=="mysqli") $this->errorMessage = mysqli_error($this->connection);
			 		return(false);
		 }
		 
	 }
 
 }
?>