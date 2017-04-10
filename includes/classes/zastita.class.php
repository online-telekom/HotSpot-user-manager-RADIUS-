<?php
if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) exit('No direct access allowed.');

/*****************************************************************
                     Made by ONLINE TELEKOM
			    - all scripts is on ENG language
				- info@online-telekom.com
				- www.online-telekom.com
*****************************************************************/

class Zastita {
	
	protected static $table_name="bruteforce_watchlist";
	
	public static function bruteforce_protect($ip) {
		global $database;
		$session = new Session();
			
		date_default_timezone_set("Europe/Zagreb");
		$date = date("d.m.Y H:i", strtotime('+'.BRUTEFORCE_TIMEOUT.' hour'));		
		$datumpr2 = date("Y-m-d H:i");
		
			
		$sql = "INSERT INTO ".self::$table_name." VALUES ('', '$ip', '$date', '5')";
		$database->query($sql);	
		$session->message('<center><hr style="color:red;width:98%"><h3 style="font-size:17px">Your IP address: ( '.$ip.' ) is temporary blocking for access. 
		Access will be again available at: '.$date.'.<center/></h3><hr style="color:red;width:98%"></center><br>');	
		unset($_SESSION['bfatt']);		
		redirect_to($return);
		
			}
		
	}	
  
?>