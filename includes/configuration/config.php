<?php

/*****************************************************************
                     Made by ONLINE TELEKOM
			    - all scripts is on ENG language
				- info@online-telekom.com
				- www.online-telekom.com
*****************************************************************/

if (__FILE__ == $_SERVER["SCRIPT_FILENAME"]) exit("Pogreška 11.");
ob_start();
ob_clean();
session_start();
defined("DB_SERVER") ? null : define("DB_SERVER", "localhost");
defined("DB_USER")   ? null : define("DB_USER", "root");
defined("DB_PASS")   ? null : define("DB_PASS", "root145670.");
defined("DB_NAME")   ? null : define("DB_NAME", "rm_db");
require("core_settings.class.php");
$core_settings = Core_Settings::find_by_sql("SELECT * FROM core_settings");
$count = count($core_settings);
for($i=0;$i <= $count-1;$i++){
	defined($core_settings[$i]->name) ? null : define($core_settings[$i]->name, $core_settings[$i]->data);
}
defined("IMAGES") ? null : define("IMAGES", WWW."img/"); 
date_default_timezone_set(TIMEZONE);
?>
