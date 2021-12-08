<?php
	
	require('../config.inc.php');
	session_start();
	$username = $_SESSION['username'];
	$password = $_SESSION['password'];
	$data = mysql_query("Select * from meh_users where username = '$username'");
	$row = mysql_fetch_array($data);
	$userguild = $row['guild'];
	$guild = mysql_query("SELECT * from meh_guilds WHERE guild = '$userguild'");
	$guildrow = mysql_fetch_array($guild);
	$guildfounder = $guildrow['Founder'];
	
	echo "<link rel='shortcut icon' href='../img/valencia.ico'><style>html { font-family: 'Arial'; font-size: 14px; font-weight: bold; }</style><title>Create Confirmed - Game Title</title>";
	
	if(isset($username)) {
		if ($row['guild']==1) {
			echo '<div style="background-color: pink; border: 1px solid red; padding: 12px; font-size: 14px; font-weight: bold;">You currently don\'t have guild, you are currently having the default ones.</div>';
		} else {
			if($row['id']==$guildfounder) {
				echo '<div style="background-color: pink; border: 1px solid red; padding: 12px; font-size: 14px;font-weight: bold;">You can not leave, you are the guild master of your guild, pass it to someone, first before you leave.</div>';
			} else {
				mysql_query("UPDATE meh_users SET guild=1 where Username='$username'");
				echo '<div style="background-color: lightgreen; border: 1px solid lime; padding: 12px; font-size: 14px; font-weight: bold;">You have successfully left your guild.</div>';
			}
		} 
	} else {
		echo '<div style="background-color: pink; border: 1px solid red; padding: 12px; font-size: 14px; font-weight: bold;">You have not logged unto your account yet.</div>';
		echo '<meta http-equiv="refresh" content="3;../home.php"></meta>';
		die();
	}
	
	
?>