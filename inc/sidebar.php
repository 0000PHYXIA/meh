<?php
include('config.inc.php');
include ('scripts.php');
?>
	<div class="sidebar-right" id="fadeobj">
		<div class="sidebar-right-zero-widget">
			<div class="sidebar-right-title">
			>> Account Details <<
			  </div>
				<div class="sidebar-right-content">
				    <center>
					
					<?php
						if(isset($_SESSION['username'])) {
							$username = $_SESSION['username'];
							$con = mysql_query("SELECT * FROM meh_users WHERE Username='$username'");
							$row = mysql_fetch_array($con);
							$accpanel = 'block';
						} else {
							$accpanel = 'none';
							echo 'No account details can be shown, you are currently not logged in.';
						}
					?>

					<table cellpadding=10 class="sidebar-right-account-details" style="display: <?php echo $accpanel; ?>;">
							<tr>
								<td><img src="img/icons/baby-boy-icon.png" align="left" valign="middle" width="26" height="26">AGE:</td>
								<td><font color="green"><?php echo $row['Age']; ?></font></td>
							</tr>
							<tr>
								<td><img src="img/icons/Student-id-icon.png" align="left" valign="middle" width="26" height="26">AccountID:</td>
								<td><font color="green"><?php echo $row['id']; ?></font></td>
							</tr>
							<tr>
								<td><img src="img/icons/user-icon.ico" align="left" valign="middle" width="20" height="20">Account Name:</td>
								<td><font color="008fff"><?php echo $row['Username']; ?></font></td>
							</tr>
							<tr>
								<td><img src="img/icons/rank-icon.ico" align="left" valign="middle" width="26" height="26">Account Status:</td>
								<td><?php if($row['Access']<0) { echo '<font color="green">Banned</font>'; } if($row['Access']== 1) { echo '<font color="630660">Player</font>'; } if($row['Access']==10) { echo '<font color="orange">VIP</font>'; } if($row['Access']==40) { echo '<font color="orange">Moderator</font>'; }  if($row['Access']==60) { echo '<font color="red">Administrator</font>'; } if($row['Access']==0) { echo '<font color="red">BANNED!!!</font>'; } if($row['Access']==100) { echo '<font color="green">OWNER</font>'; } ?></td>
							</tr>
							<tr>
								<td><img src="img/icons/coin-icon.ico" align="left" valign="middle" width="21" height="21"><font color="red">Coins:</td>
								<td><?php echo $row['Coins']; ?></font></td>
							</tr>
							<tr>
								<td><img src="img/icons/dollar-icon.ico" align="left" valign="middle" width="25" height="25">Gold:</td>
								<td><font color="blue"><?php echo $row['Gold']; ?></font></td>
							</tr>
							<tr>
								<td><img src="img/icons/level-icon.ico" align="left" valign="middle" width="26" height="26">Level:</td>
								<td><font color="green"><?php echo $row['Level']; ?></font></td>
							</tr>
							<tr>
								<td><img src="img/icons/pvp-icon.ico" align="left" valign="middle" width="22" height="22">PVP Kills:</td>
								<td><font color="green"><?php echo $row['Kills']; ?></font></td>
							</tr>
							<tr>
								<td><img src="img/icons/death-icon.ico" align="left" valign="middle" width="22" height="22">PVP Deaths:</td>
								<td><font color="red"><?php echo $row['Deaths']; ?></font></td>
							</tr>
							<tr>
								<td><img src="img/icons/shopping-bag-icon.png" align="left" valign="middle" width="18" height="18">BagSpace:</td>
								<td><font color="orange"><?php echo $row['BagSlots']; ?></font></td>
							</tr>
							<tr>
								<td><img src="img/icons/bank-icon.ico" align="left" valign="middle" width="18" height="18">BankSpace:</td>
								<td><font color="orange"><?php echo $row['BankSlots']; ?></font></td>
							</tr>
							<tr>
								<td><img src="img/icons/home.png" align="left" valign="middle" width="18" height="18">HouseSpace:</td>
								<td><font color="orange"><?php echo $row['HouseSlots']; ?></font></td>
							</tr>
							<tr>
								<td><img src="img/icons/gender.png" align="left" valign="middle" width="26" height="26">Gender:</td>
								<td><?php if($row['Gender']<L) { echo '<font color="green"></font>'; } if($row['Gender']== M) { echo '<font color="red">Male</font>'; } if($row['Gender']==F) { echo '<font color="red">Femele</font>'; } ?></td>
							</tr>
                    </table>
				 </center>
			  </div>
		   </div>
		<div class="sidebar-right-first-widget">
			<div class="sidebar-right-title">
			  >> Account <<
			  </div>
				<div class="sidebar-right-content">
				    <center>
					<?php
						if(isset($_SESSION['username'])) {
							echo '<center>';
							echo '<h3>Welcome back, ';
							echo $_SESSION['username'];
							echo '</center></br></h3>';
						} else {
							echo '<form method="POST" action="home.php">
						<center>
							<table align="center">
								<tr>
									<td>Username:</td>
									<td><input type="text" name="username"></td>
								</tr>
								<tr>
									<td>Password:</td>
									<td><input type="password" name="password"></td>
								</tr>
								<tr>
									<td colspan=2 align="center"><a href="signup.php">Create your account.</a></td>
								</tr>
								<tr>
									<td colspan=2 align="center"><input type="submit" value="Login"><input type="reset"></td>
								</tr>
							</table>
						</center>
					</form>';
						}
					?>
					<?php
	                    include('config.inc.php');

	                   error_reporting(0);
	                if(isset($_POST['username']) && isset($_POST['password'])) {
		            if($_POST['username']=="" || $_POST['password']=="") {
			              echo '<p class="error">You have not entered a username/password.</p>';
		              } else {

		           // Assigns Variables to Encoded Account Information
			               $username = $_POST['username'];
			               $password = $_POST['password'];
		
			          // Defines gen_token
			         function gen_token($pass, $salt) {
			              $salt = strtolower($salt);
			              $str = hash("sha512", $pass.$salt);
			              $len = strlen($salt);
			         return strtoupper(substr($str, $len, 17));
			        }
			
			      // Protects from SQLi Hacking Exploit
			              $username = stripslashes($username);
			              $password = stripslashes($password);
			              $username = mysql_real_escape_string($username);
			              $password = mysql_real_escape_string($password);
			              $password = gen_token($password, $username);
			              $sql = "SELECT * FROM meh_users WHERE Username='$username' and Password='$password'";
			              $result = mysql_query($sql);
			
			      // Checks if the Account Exists
			              $count = mysql_num_rows($result);
			
		            if($count==1) {
					    session_start();
					    $_SESSION['username']=$_POST['Username'];
					    $_SESSION['password']=$_POST['Password'];
			              echo '<p class="success">Successfully Logged in, Welcome!</p>';
			              echo $_SESSION["Username"];
					      echo '<meta http-equiv="refresh" content="3;home.php"></meta>';
		              } else {
				          echo '<p class="error">You\'ve entered a wrong username or password.</p>';
			          }
		                  }
	                  }
	                ?>
				    </center>
              </div>
			</div>
		<div class="sidebar-right-second-widget">
			<div class="sidebar-right-title">
			>> Play Now <<
			  </div>
				<div class="sidebar-right-content">
				    <center>
	                <?php
								if(isset($_SESSION['username'])) {
		              } else {
			              echo 'You have not logged in, please login in order to play.';
					  }
	                ?>
                    <?php include 'servers.php' ?>
					</center>
				</div>
			</div>
		<div class="sidebar-right-third-widget">
			<div class="sidebar-right-title">
			>> Users Online <<
			  </div>
				 <div class="sidebar-right-content">
				    <center>
					   <?php
						$con = mysql_query("SELECT * FROM meh_servers WHERE Name='Gladiator'");
						$row = mysql_fetch_array($con);
						echo $row['Count'];
						echo ' users are online';
					  ?>
					 </center>
				   </div>
				</div>
			<style>
				div.sidebar-right-fourth-widget div.sidebar-right-content table td, th {
					padding: 8px;
				}
			</style>