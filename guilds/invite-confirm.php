<?php session_start(); ?>
<style>
	html {
	font-family: Arial;
	font-size: 14px;
	font-weight: bold;
	}
	#success {
	background-color: lightgreen;
	border: 1px solid lime;
	padding: 12px;
	}
	#fail {
	background-color: pink
	border: 1px solid red;
	padding: 12px;
	}
</style>
<?php
	
	require('../config.inc.php');
	$username = $_SESSION['username'];
	$password = $_SESSION['password'];
	$usertoinvite = $_POST['invitename'];
	
	if(isset($_SESSION['username'])) {
		
	} else {
		echo '<div id="fail">You have not logged in yet.</div>';
		echo '<meta http-equiv="refresh" content="0;../home.php">';
		die();
	}	
	
	$data = mysql_query("SELECT * from meh_users where Username='$username'");
	$row = mysql_fetch_array($data);
	$guild = $row['guild'];
	$guildata = mysql_query("SELECT * from meh_guilds where guild='$guild'");
	$guildatarow = mysql_fetch_array($guildata);
	$usertodata = mysql_query("SELECT * from meh_users where Username='$usertoinvite'");
	$usertorow = mysql_fetch_array($usertodata);
	
	
	if($usertorow['guild']==1) {
		if($usertorow['GuildInvite']==0) {
			if($row['id']==$guildatarow['Founder']) {
				$guildinviter = $row['guild'];
				echo '<div id="success">You have successfully invited him/her.</div>';
				mysql_query("UPDATE meh_users SET GuildInvite='$guildinviter' WHERE Username='$usertoinvite'");
			} else {
				echo $guildatarow['Founder'];
				echo '<div id="fail">You can\'t invite someone, you have to be the guild leader.</div>';
			}
		} else {
			echo '<div id="fail">The user whom you want to invite is being invited by another user, please wait until the user declines invitation, each user can only hold 1 invitation.</div>';
		}
		} else {
			echo '<div id="fail">The user whom you want to invite already has a guild, you can\'t possibly invite someone who has a guild. Please wait until he / she leaves his /her guild.</div>';
		}
	
	
?>