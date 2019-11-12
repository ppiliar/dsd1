<?php 

class Database {

	protected static $connection;
	
	protected static $node_id;
	/**
	 * Connect to the database
	 * 
	 * @return bool false on failure / mysqli MySQLi object instance on success
	 */
	public function connect() {
		// Try and connect to the database
		if(!isset(self::$connection)) {

			// Load configuration as an array. Use the actual location of your configuration file
			// Put the configuration file outside of the document root
			$config = parse_ini_file('config.ini'); 
			self::$node_id = $config['nodeID'];
			self::$connection = new mysqli('localhost',$config['username'],$config['password'],$config['dbname']);
		}
	
		// If connection was not successful, handle the error
		if(self::$connection === false) {
			// Handle error - notify administrator, log to a file, show an error screen, etc.
			return false;
		}
		return self::$connection;
	}
	
	/**
	 * Query the database
	 *
	 * @param $query The query string
	 * @return mixed The result of the mysqli::query() function
	 */
	public function query($query) {
		// Connect to the database
		$connection = $this -> connect();
		
		// Query the database
		$result = $connection -> query($query);

		return $result;
	}
	
	/**
	 * Fetch rows from the database (SELECT query)
	 *
	 * @param $query The query string
	 * @return bool False on failure / array Database rows on success
	 */
	public function select($query) {
		$rows = array();
		$result = $this -> query($query);
		if($result === false) {
			return false;
		}
		while ($row = $result -> fetch_assoc()) {
			$rows[] = $row;
		}
		return $rows;
	}
	
	/**
	 * Fetch the last error from the database
	 * 
	 * @return string Database error message
	 */
	public function error() {
		$connection = $this -> connect();
		return $connection -> error;
	}
	
	/**
	 * Quote and escape value for use in a database query
	 *
	 * @param string $value The value to be quoted and escaped
	 * @return string The quoted and escaped string
	 */
	public function quote($value) {
		$connection = $this -> connect();
		return "'" . $connection -> real_escape_string($value) . "'";
	}

	public function last_id(){
		$connection = $this -> connect();
		return $connection -> insert_id;
	}

	public function get_this_id(){
		$this -> connect();
		return self::$node_id;
	}


	public function reset_db(){
		$connection = $this -> connect();
        $sql = "DELETE FROM osoba;";
        $connection->query($sql);
        $sql = "
		INSERT INTO `osoba` (`id`, `meno`, `priezvisko`, `titul`, `rc`, `nickname`, `heslo`, `nodeID`) VALUES
		(1, 'Ján', 'Zeller', 'bc.', 8512113647, 'zell', 'zell',1),
		(2, 'Ivan', 'Kaleráb', '', 7905263254, 'kale', 'kale',1),
		(3, 'Emil', 'Kapusta', 'Ing.', 8004153268, 'kapu', 'kapu',1),
		(4, 'Jana', 'Kapustová', 'Mgr.', 8561125421, 'jaka', 'jaka',1),
		(5, 'Natália', 'Mrkvová', 'Ing.', 8706292365, 'namr', 'namr',1),
		(6, 'Ivan', 'Cibula', 'PhDr.', 7606063256, 'cibu', 'cibu',1),
		(7, 'Ján', 'Cibula', 'Mgr.', 7805232547, 'jaci', 'jaci',1),
		(8, 'Olivia', 'Cesnaková', '', 8962113584, 'olce', 'olce',1),
		(9, 'Peter', 'Karfiol', 'PhDr.', 7402056523, 'karfi', 'karfi',1),
		(10, 'Ivan ', 'Ivanka', 'MVDr.', 7251652514, 'ivan', 'ivan',1);
        ";
        $result = $connection->query($sql);
        return $result;
	}

}
