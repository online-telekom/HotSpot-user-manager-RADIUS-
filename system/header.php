<?php
if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) exit('No direct access allowed.');
 
/*****************************************************************
                     Made by ONLINE TELEKOM
			    - all scripts is on ENG language
				- info@online-telekom.com
				- www.online-telekom.com
*****************************************************************/ 
 
$id=$admin->id;

$sql = 'select * from users WHERE id="1"';
$rezultat = $database->query($sql);
$row = $database->fetch_array($rezultat);

$Aime2 = $row['ime2'];

$ime = $row['first_name'];
$prezime = $row['last_name'];
$email = $row['email'];

if(isset($_GET['stranica'])){
$stranica = clean_value($_GET['stranica']);
}else{
	$stranica='';
}

$datum = date('d.m.Y');
?>
   
<title>WIFI Coupons Manager</title>
<header class="mn-header navbar-fixed">
                <nav class="cyan darken-1">
                    <div class="nav-wrapper row">
                        <section class="material-design-hamburger navigation-toggle">
                            <a href="javascript:void(0)" data-activates="slide-out" class="show-on-large material-design-hamburger__icon reverse-icon">
                                <span class="material-design-hamburger__layer material-design-hamburger__icon--from-arrow"></span>
                            </a>
                        </section>
                        <div class="header-title col s3 m3">      
                           <a href="index.php"> <span class="chapter-title">Admin</span></a>
                        </div>
						<ul class="right col s9 m3 nav-right-menu">
                            <li><a href="javascript:void(0)" data-activates="chat-sidebar" class="chat-button show-on-large"><i class="material-icons">more_vert</i></a></li>
							 <li><a href="javascript:void(0)" onclick="toggleFullScreen()" class="chat-button show-on-large"><i class="material-icons">fullscreen</i></a></li>
                            <li><a href="."><i class="material-icons">cached</i></a>
							
						</li>
						
                        </ul>   
                    </div>
                </nav>
            </header>
<aside id="slide-out" class="side-nav white fixed">
                <div class="side-nav-wrapper">
                    <div class="sidebar-profile">
                       
                        <div class="sidebar-profile-info">
                            <a href="javascript:void(0);">
                                <p><?php echo $ime; echo ' '; echo $prezime; ?></p>
                                <span><?php echo $email; ?></span>
                            </a>
                        </div>
                    </div>
					
					<?php 
				
					if ($stranica == 'podrska' or $stranica == 'podrska-p' or $stranica == 'postavke-k' or $stranica == 'povijest'){
						echo ' <ul style="display:none" class="sidebar-menu collapsible collapsible-accordion" data-collapsible="accordion">
               ';
					} else {
						echo '          <ul class="sidebar-menu collapsible collapsible-accordion" data-collapsible="accordion">
               ';
					}
					
					?>
        
                
					<?php 
					if(!isset($_GET['stranica'])){
						echo '<li class="no-padding active"><a class="waves-effect" href="index.php"><i class="material-icons">settings_input_svideo</i>Dashboard</a></li>';
					} else {
						echo '<li class="no-padding"><a class="waves-effect" href="index.php"><i class="material-icons">settings_input_svideo</i>Dashboard</a></li>';
					}
					
					
				
					?>
					 <li class="divider"></li>
                            <li class="no-padding">
                                <a href="odjava.php"class="waves-effect waves-grey"><i class="material-icons">exit_to_app</i>Logout</a>
                            </li>
					
                </ul>
              
                </div>
            </aside>
