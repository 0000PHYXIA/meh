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
				
	if(isset($_SESSION['username'])) {
		
	} else {
	echo '<div id="fail">You have not logged in yet.</div>';
	echo '<meta http-equiv="refresh" content="0;../home.php">';
	die();
	}	
	
	$data = mysql_query("SELECT * from meh_users where Username='$username'");
	$row = mysql_fetch_array($data);
	
	if($row['GuildInvite']==0) {
		echo '<div id="fail">You can not accept a decline since no one invited you.</div>';
	} else {
		mysql_query("UPDATE meh_users SET GuildInvite='0' WHERE Username='$username'");
		echo '<div id="success">You have successfully declined the invitation.</div>';
	}
?>