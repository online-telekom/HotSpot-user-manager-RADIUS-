<?php 
/*****************************************************************
                     Made by ONLINE TELEKOM
			    - all scripts is on ENG language
				- info@online-telekom.com
				- www.online-telekom.com
*****************************************************************/

require_once("includes/inc_files.php"); 
require_once("includes/classes/admin.class.php");

// user not logged in
if(!$session->is_logged_in()) {redirect_to("prijava.php");}
else{

//define for logged user
$admin = Admin::find_by_id($_SESSION['masdyn']['ams']['user_id']);
$admin_class = new Admin();
$active_page = "overview";
	
$adminid=$admin->id; //define user id from session
$ime2=$admin->ime2; //define full name from session

//check user permissions
if ($admin->user_level != '293847'){
	$session->message('You dont have access for this page.');
	$session->logout();
	redirect_to("prijava.php");
}
}

//ukoliko postoji poruka za prikazati
if(isset($_SESSION['oauth_message'])){
	$message = $_SESSION['oauth_message'];
	unset($_SESSION['oauth_message']);
}


?>
<html lang="en">
<head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="ISTRACOM - CALL MANAGER" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
		<link href="assets/plugins/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>   
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <!-- Styles -->
		<link rel="stylesheet" href="<?php echo WWW;?>includes/themes/<?php echo THEME_NAME;?>/assets/css/font-awesome.min.css">
        <link type="text/css" rel="stylesheet" href="assets/plugins/materialize/css/materialize.min.css"/>
		
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">    
        

		
        <link href="assets/css/alpha.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
		
		<link href="assets/typicons/typicons.min.css" rel="stylesheet" type="text/css"/>

    </head>
    <body>
        <div class="loader-bg"></div>
        <div class="loader">
            <div class="preloader-wrapper big active">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-teal lighten-1">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
				
            </div>
        </div>
        <div class="mn-content fixed-sidebar">

<?php require_once 'system/header.php';?>
<?php require_once 'system/panel.php';?>
<?php require 'system/footer.php'; ?>

