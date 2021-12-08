<?php
	$createname = $_POST['createname'];
	$createdesc = $_POST['createdesc'];
	$createmotd = $_POST['createmotd'];
	
	if($createname=="") {
				echo '<div style="background-color: pink; border:1px solid red; padding: 12px; font-size: 14px; font-family: Arial;">A field is missing.</div> ';
				die();
	}
	if ($createdesc=="") {
		echo '<div style="background-color: pink; border:1px solid red; padding: 12px; font-size: 14px; font-family: Arial;">A field is missing.</div> ';
		die();
	}
	if($createmotd=="" ) {
				echo '<div style="background-color: pink; border:1px solid red; padding: 12px; font-size: 14px; font-family: Arial;">A field is missing.</div> ';
				die();
	}
	require('../config.inc.php');
	session_start();
	$username = $_SESSION['username'];
	$password = $_SESSION['password'];
	$data = mysql_query("Select * from meh_users where username = '$username'");
	$row = mysql_fetch_array($data);
	$guild = mysql_query("Select * from meh_guilds where GuildName = '$createname'");
	$guildrow = mysql_fetch_array($guild);
	$guildid = $guildrow['guild'];
	$userid = $row['id'];
	$guilddup = mysql_num_rows($guild);
	echo "<link rel='shortcut icon' href='../img/icon.png'><style>html { font-family: 'Arial'; font-size: 14px; font-weight: bold; }</style><title>Create Confirmed - Game Title</title>";
	
	error_reporting(0);
	
	if(isset($username)) {
		
	} else {
		echo '<div style="background-color: pink; border: 1px solid red; padding: 12px;">You have not logged unto your account yet.</div>';
		echo '<meta http-equiv="refresh" content="3;../home.php"></meta>';
		die();
	}
	if($row['Coins']<1500) {
		echo '<div style="background-color: pink; border: 1px solid red; padding: 12px;">Sorry, but you do not enough funds to pursue this operation. [Guild Create] You must have at least 1,500 ACs to be spent by making one.</div>';
		echo '<meta http-equiv="refresh" content="3;../home.php"></meta>';
	} else {
		if($row['guild']==1) {
			if($guilddup>0) {
				echo '<div style="background-color: pink; border: 1px solid red; padding: 12px; font-family: Arial; font-size: 14px; font-weight: bold; ">Sorry, but the name of the guild that you desired to have is already taken.</div>';
			} else {
				echo '<div style="background-color: lightgreen; border: 1px solid lime; padding: 12px;">You have successfully created your guild.</div>';
				mysql_query("INSERT INTO meh_guilds (GuildName, Description, GuildMOTD, GuildColor, Founder, GuildFounder, Members, Pending) VALUES ('$createname', '$createdesc', '$createmotd', '912374', '$userid', '$username', '0', '0')");
				$guildname = mysql_query("Select * from meh_guilds where GuildName = '$createname'");
				mysql_query("UPDATE meh_users SET Coins=Coins-1500 WHERE Username='$username'");
				$guildnamerow = mysql_fetch_array($guildname);
				$guildnameid = $guildnamerow['guild'];
				mysql_query("UPDATE meh_users SET guild='$guildnameid' WHERE Username='$username'");
				echo '<meta http-equiv="refresh" content="3;../home.php"></meta>';
			}
		} else {
			echo '<div style="background-color: pink; padding: 12px; border: 1px solid red; font-family: Arial; font-size: 14px; font-weight: bold;">Sorry, but you can not make a guild while you are a part of another guild. Leave your currently existing guild first before you continue this operation. </div>';
		}
	}
?>