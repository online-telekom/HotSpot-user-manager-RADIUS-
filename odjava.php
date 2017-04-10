<?php 
/*****************************************************************
                     Made by ONLINE TELEKOM
			    - all scripts is on ENG language
				- info@online-telekom.com
				- www.online-telekom.com
*****************************************************************/

require_once("includes/inc_files.php"); 

// logout user	
$session->logout();
redirect_to("index.php");
exit;
?>