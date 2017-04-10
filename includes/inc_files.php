<?php
if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) exit('No direct access allowed.');

/*****************************************************************
                     Made by ONLINE TELEKOM
			    - all scripts is on ENG language
				- info@online-telekom.com
				- www.online-telekom.com
*****************************************************************/

if(is_dir("install")){
	if(filesize("includes/configuration/config.php") == 0){
		echo "Please go <a href='install/'>here</a> to install this script. If you have already gone though the install process, please delete the install directory and refresh this page. ";
	    exit;
	} else {
		echo "We are currently carrying out some routine maintenance, please check back soon.";
	    exit;
	}
}

require_once("configuration/config.php");
require_once("classes/admin.class.php");
require_once("classes/database.class.php");
//require_once("classes/radius.db.php");
require_once("classes/functions.class.php");
require_once("classes/session.class.php");
require_once("classes/user.class.php");
require_once("classes/zastita.class.php");

?>