<?php 

/*****************************************************************
                     Made by ONLINE TELEKOM
			    - all scripts is on ENG language
				- info@online-telekom.com
				- www.online-telekom.com
*****************************************************************/

// get webpage
if(isset($_GET['stranica'])){
	$stranica = clean_value($_GET['stranica']);
// allowed page for show

$dozvoljene = array('ploca', 'ovlasti', 'pdf');

// spajanje stranice sa dozvoljenima
if(in_array($stranica, $dozvoljene)){		
		// provjera stranica
		switch ($stranica){
			
		case 'ploca':
			require './panel/ploca.php';			
		break;	
		
		case 'pdf':
			require './panel/ex.php';			
		break;	
			
		case 'ovlasti':
			require 'ovlasti.php';			
		break;	
		}
	}else {
	require './panel/ploca.php';
}
}else {
	require './panel/ploca.php';
}


?>

