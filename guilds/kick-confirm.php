<?php
	
	require('../config.inc.php');
	session_start();
	$username = $_SESSION['username'];
	$password = $_SESSION['password'];
	$kickname = $_POST['kickname'];
	$data = mysql_query("Select * from meh_users where username = '$kickname'");
	$yourdata = mysql_query("Select * from meh_users where username = '$username'");
	$yourrow = mysql_fetch_array($yourdata);
	$row = mysql_fetch_array($data);
	$guild = mysql_query("Select * from meh_guilds where Founder = '$yourrow[id]'");
	$guildrow = mysql_fetch_array($guild);
	$guildid = $guildrow['guild'];
	$userid = $row['id'];
	$guilddup = mysql_num_rows($guild);
	echo "<link rel='shortcut icon' href='../img/valencia.ico'><style>html { font-family: 'Arial'; font-size: 14px; font-weight: bold; }</style><title>Create Confirmed - Game Title</title>";
		
		
	if(isset($username)) {
		} else {
		echo '<div style="background-color: pink; border: 1px solid red; padding: 12px; font-size: 14px; font-weight: bold;">Sorry, but it looks like you have not logged in yet. Redirecting you to login page. <meta http-equiv="refresh" content="3;../home.php"></meta></div>';
		}
	
	if(isset($_POST['kickname'])) {
	
	} else {
		 echo 'Looks like you have not filled anything.<meta http-equiv="refresh" content="3;../home.php"></meta>';
	}
		
	if($kickname=="") {
		echo '<div style="background-color: pink; border: 1px solid red; padding: 12px; font-size: 14px; font-weight: bold; font-family: arial;">You can not kick no one.</div>';
	}
	
	if($guildrow['Founder']==$yourrow['id']) {
			if($row['guild']==$yourrow['guild']) {
				if($yourrow['id']==$guildrow['Founder']) {
					echo '<div style="background-color: pink; color: 1px solid red; padding: 12px;">You can not leave while you are the group leader.</div>';
				} else {
					mysql_query("UPDATE meh_users SET guild='1' WHERE id='$row[id]'");
					echo '<div style="background-color: lightgreen; border: 1px solid lime; padding: 12px;">You have successfully kicked the member.</div>';
				}
			} else {
				echo '<div style="background-color: pink; border: 1px solid red; padding: 12px; font-size: 14px; font-weight: bold;">The member whom you\'re trying to kick does not belong to your guild.</div>';
			}
	} else {
		echo '<div style="background-color: pink; border: 1px solid red; padding: 12px; font-size: 14px; font-weight: bold;">You are not the guild leader of your currently affiliated guild, you do not have enough rights to continue this operation.</div>';
	}
?>