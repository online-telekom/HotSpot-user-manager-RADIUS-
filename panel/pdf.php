<?php
require('html2pdf.php');

if(isset($_GET['username'])){
	$username = $_GET['username'];
}else{
	//die();
}
if(isset($_GET['ime2'])){
	$ime2 = iconv('UTF-8', 'windows-1252', $_GET['ime2']);
}else{
	//die();
}
if(isset($_GET['datum'])){
	$datum = $_GET['datum'];
}else{
	//die();
}
if(isset($_GET['simusers'])){
	$simusers = $_GET['simusers'];
}else{
	//die();
}

$pdf = new createPDF(
		$datum,   // html text to publish
		'USERNAME: '.$username.'',  // article title
		$simusers,    // article URL
		$ime2, // author name
		time()
	);
    $pdf->run();

?>

