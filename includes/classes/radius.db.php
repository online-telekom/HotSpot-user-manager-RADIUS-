<?php
if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) exit('No direct access allowed.');

/*****************************************************************
                     Made by ONLINE TELEKOM
			    - all scripts is on ENG language
				- info@online-telekom.com
				- www.online-telekom.com
*****************************************************************/

$server = "localhost"; //ip address from radius server
$user = "user"; // user for access to mysql server
$password = "password"; //password to access to mysql server 
$baza = "radius"; //name of mysql database
$rdpassword = "lozinka"; // name of uniq password for connections

defined("DB_SERVER_R") ? null : define("DB_SERVER_R", $server);
defined("DB_USER_R")   ? null : define("DB_USER_R", $user);
defined("DB_PASS_R")   ? null : define("DB_PASS_R", $password);
defined("DB_NAME_R")   ? null : define("DB_NAME_R", $baza);

class RadiusDatabase {
	
	public $connection;
	public $last_query;
	private $magic_quotes_active;
	private $real_escape_string_exists;
	
    function __construct() {
    	$this->open_connection();
		$this->magic_quotes_active = get_magic_quotes_gpc();
		$this->real_escape_string_exists = function_exists( "mysqli_real_escape_string" );
    }

	public function open_connection() {
		
		$this->connection = new mysqli('p:'. DB_SERVER_R, DB_USER_R, DB_PASS_R,DB_NAME_R);
		
	}

	public function close_connection() {
		if(isset($this->connection)) {
			mysqli_close($this->connection);
			unset($this->connection);
		}
	}

	public function query($sql) {
		$this->last_query = $sql;
		mysqli_set_charset( $this->connection, 'utf8');
		$result = mysqli_query($this->connection, $sql);
		$this->confirm_query($result);
		return $result;
	}
	
	public function escape_value( $value ) {
		if( $this->real_escape_string_exists ) { // PHP v4.3.0 or higher
			// undo any magic quote effects so mysqli_real_escape_string can do the work
			if( $this->magic_quotes_active ) { $value = stripslashes( $value ); }
			$value = mysqli_real_escape_string($this->connection, $value );
		} else { // before PHP v4.3.0
			// if magic quotes aren't already on then add slashes manually
			if( !$this->magic_quotes_active ) { $value = addslashes( $value ); }
			// if magic quotes are active, then the slashes already exist
		}
		return $value;
	}
	
	// "database-neutral" methods
   public function fetch_array($result_set) {
    return mysqli_fetch_array($result_set);
   }

   public function num_rows($result_set) {
    return mysqli_num_rows($result_set);
   }
  
   public function insert_id() {
    // get the last id inserted over the current db connection
    return mysqli_insert_id($this->connection);
   }
  
   public function affected_rows() {
    return mysqli_affected_rows($this->connection);
   }

	private function confirm_query($result) {
		if (!$result) {
			print_r('<br><center><hr style="color:red;width:98%"><h3 style="font-size:17px">Problem with RADIUS Server.<center/></h3><hr style="color:red;width:98%"></center><br>');
		}
	}
	
}

$radiusdb = new RadiusDatabase();
$db =& $radiusdb;


?>
