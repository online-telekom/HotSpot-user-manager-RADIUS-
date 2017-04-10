<?php

/*****************************************************************
                     Made by ONLINE TELEKOM
			    - all scripts is on ENG language
				- info@online-telekom.com
				- www.online-telekom.com
*****************************************************************/
require('html2pdf.php');
$datum_today = date("d.m.Y H:i");
$raduser = radusername(8);
$user_id = $ime2;
$rdpassword = "PROMJENI ME NA KRAJU";
//$datum_test = datum_radius($datum_today);
if (isset($_POST['forma'])){
	$username = $raduser;
	$date = $_POST["datum"];
	$simusers = $_POST["simusers"];
	$raddate = datum_radius($_POST["datum"]);
	
	$sql = "INSERT INTO bonovi (user_id,username,trajanje,datum) VALUES ('$user_id','$username','$date','$datum_today')";
	$result = $database->query($sql);
	if ($result){
	//	$sql2 = "INSERT INTO radcheck (username,attribute,op,value) VALUES ('$username','Cleartext-Password',':=','$rdpassword')";
	//	$sql3 = "INSERT INTO radcheck (username,attribute,op,value) VALUES ('$username','Simultaneous-Use',':=','$simusers')";
	//	$sql4 = "INSERT INTO radcheck (username,attribute,op,value) VALUES ('$username','Expiration',':=','$simusers')";
	//	$sql5 = "INSERT INTO radusergroup (username,groupname,priority) VALUES ('$username','Default','10')";
	//	$database->query($sql2);
	//	$database->query($sql3);
	//	$database->query($sql4);
	//	$database->query($sql5);
		redirect_to("panel/pdf.php?username={$username}&ime2={$ime2}&simusers={$simusers}&datum={$date}");
		
	}
}

$sqlbon = "SELECT * FROM bonovi ORDER BY id ASC";
$resultbon = $database->query($sqlbon);
?>
<style>
.loader2 {
  border: 16px solid rgba(194, 194, 194, 0.6);
  border-radius: 50%;
  border-top: 16px solid #007483;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
  float: left;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
<main class="mn-inner">
                <div class="row">
				<?php echo $message;?>
                    <div class="col s12">
                        <div class="page-title">CREAT AN COUPON FOR WIFI ACCESS</div>
                    </div>
                    <div class="col s12 ">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title">CREATING A COUPON</span><br>
                                <div class="row">
                                    <form method="POST" class="col s12" >
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <input disabled placeholder="VPN USERNAME" id="rad_user" name="rad_user" value="<?php echo $raduser;?>" class="validate" type="text">
                                                <label for="rad_user" class="active">VPN USERNAME</label>
                                            </div>
											<div class="input-field col s6">
                                                <input disabled placeholder="PASSWORD FOR CONNECTION" id="rad_pw"  value="<?php echo $rdpassword;?>" class="validate" type="text">
                                                <label for="rad_pw" class="active">PASSWORD FOR CONNECTION (password is already define)</label>
                                            </div>
											<div class="input-field col s6">
                                                <input placeholder="END TIME FOR CONNECTION" id="datum" name="datum" class="validate" type="text" value="<?php echo $datum_today;?>">
                                                <label for="datum" class="active">END TIME FOR CONNECTION</label>
                                            </div>
											<div class="input-field col s6">
                                                <input placeholder="NUMBER OF ALLOWED SIMULTANEOUS USERS" id="simusers" name="simusers" class="validate" type="text" value="1">
                                                <label for="simusers" class="active">NUMBER OF ALLOWED SIMULTANEOUS USERS</label>
                                            </div>
                                         
										
										
                                        </div>
                                        <input  style="float:right;" class="btn teal lighten-1" type="submit" name="forma" value="CREATE" />
                                    </form>
                                </div>
                            </div>
                        </div>
                      
                    </div>
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title">ALL WIFI COUPONS</span>
                                <table id="example" class="display responsive-table datatable-example">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>CREATED BY</th>
                                            <th>USERNAME FOR COUPON</th>
                                            <th>END TIME FOR CONNECTION</th>
                                            <th>CREATED DATE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php while ($rbon = $database->fetch_array($resultbon)){?>
                                        <tr>
                                            <td><?php echo $rbon["id"]; ?></td>
                                            <td><?php echo $rbon["user_id"]; ?></td>
                                            <td><?php echo $rbon["username"]; ?></td>
                                            <td><?php echo $rbon["trajanje"]; ?></td>
                                            <td><?php echo $rbon["datum"]; ?></td>
                                          
                                       
                                        </tr>
									<?php } ?>
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>
            </main>