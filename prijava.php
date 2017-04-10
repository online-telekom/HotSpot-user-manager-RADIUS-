<?php
/*****************************************************************
                     Made by ONLINE TELEKOM
			    - all scripts is on ENG language
				- info@online-telekom.com
				- www.online-telekom.com
*****************************************************************/
require_once("includes/inc_files.php");

if($session->is_logged_in()) {
  redirect_to("index.php");
}

if (isset($_POST['submit'])) { // Form has been submitted.
	
	$username = trim($_POST['username']);
	$password2 = trim($_POST['password']);
	$password = md5($password2);
	$remember = 'yes';	
	
	if ($_SESSION['bfatt'] >= BRUTEFORCE_LIMIT){
	$ip = $_SERVER['REMOTE_ADDR'];
	Zastita::bruteforce_protect($ip);
	
	}
	
	if (!$username == '' && !$password == '') {
		$current_ip = $_SERVER['REMOTE_ADDR'];
		$ip = $_SERVER['REMOTE_ADDR'];		
		
		$return = User::check_login($username, $password, $current_ip, $remember);
		if($return == "false"){			
			$_SESSION['bfatt']++ ;
			redirect_to("prijava.php");
		} else {
			unset($_SESSION['bfatt']);
			redirect_to("index.php");	
      }
	}else {
		$message = "<div class='alert alert-error'><button type='button' class='close' data-dismiss='alert'>×</button>Please enter all filed.</div>";
	}
  
} else { // Form has not been submitted.
	$username = "";
	$password = "";
	$remember = '';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
		<title>Login in</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        
        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="assets/plugins/materialize/css/materialize.min.css"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">        

        	
        <!-- Theme Styles -->
        <link href="assets/css/alpha.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
        
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="http://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="http://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
    </head>
    <body class="signin-page">
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
                <div class="spinner-layer spinner-red">
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
        <div class="mn-content valign-wrapper">
            <main class="mn-inner container">
                <div class="valign">
                      <div class="row">
					
                          <div class="col s12 m6 l4 offset-l4 offset-m3">
                              <div class="card white darken-1">
                                  <div class="card-content ">
                                      <span class="card-title">Login in</span>
									      <?php echo output_message($message); ?>
                                       <div class="row">
                                       
										<form method="post" >
                                               <div class="input-field col s12">
                                                   <input type="text" name="username" class="validate" value="<?php echo htmlentities($username); ?>">
                                                   <label for="email">Username</label>
                                               </div>
                                               <div class="input-field col s12">
                                                   <input id="password" name="password" type="password" class="validate" value="<?php echo htmlentities($password); ?>">
                                                   <label for="password">Password</label>
                                               </div>
											  
											    <div class="input-field col s12">
													
													<input id="test5" type="checkbox" name="remember" value="yes" >
													<label for="test5" style="font-size:12px;">Remember me.</label>
                                       
												</div>
												<clear><br>
											
												
                                               <div class="col s12 center-align m-t-sm">
											   <br>
											<input class="btn btn-primary" type="submit" name="submit" value="Login in" />
                                               </div>
                                           </form>
                                      </div>
                                  </div>
                              </div>
                          </div>
                    </div>
                </div>
            </main>
        </div>
        
        <!-- Javascripts -->
        <script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
        <script src="assets/plugins/materialize/js/materialize.min.js"></script>
        <script src="assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
        <script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="assets/js/alpha.min.js"></script>
        
    </body>
</html>